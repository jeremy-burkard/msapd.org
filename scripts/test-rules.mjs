// Exercise firestore.rules against the emulator:
//   firebase emulators:exec --only firestore --project demo-msapd "node scripts/test-rules.mjs"
import { initializeApp } from 'firebase/app';
import {
  getFirestore, connectFirestoreEmulator, addDoc, collection, getDocs, serverTimestamp, Timestamp,
} from 'firebase/firestore/lite';

const db = getFirestore(initializeApp({ projectId: 'demo-msapd', apiKey: 'x' }));
connectFirestoreEmulator(db, '127.0.0.1', 8080);
const leads = collection(db, 'leads');

const valid = {
  name: 'Test Piper', email: 'piper@example.com', phone: '', topic: 'learn',
  instrument: 'Bagpipes', message: 'Hi!', source: 'landing', status: 'new', createdAt: serverTimestamp(),
};

const cases = [
  ['valid lead is accepted', () => addDoc(leads, valid), true],
  ['extra field rejected', () => addDoc(leads, { ...valid, admin: true }), false],
  ['bad topic rejected', () => addDoc(leads, { ...valid, topic: 'hack' }), false],
  ['bad email rejected', () => addDoc(leads, { ...valid, email: 'nope' }), false],
  ['status other than new rejected', () => addDoc(leads, { ...valid, status: 'member' }), false],
  ['client timestamp rejected', () => addDoc(leads, { ...valid, createdAt: Timestamp.now() }), false],
  ['oversized message rejected', () => addDoc(leads, { ...valid, message: 'x'.repeat(2001) }), false],
  ['public cannot read leads', () => getDocs(leads), false],
  ['other collections locked', () => addDoc(collection(db, 'members'), { name: 'x' }), false],
];

let failed = 0;
for (const [name, fn, shouldPass] of cases) {
  let ok;
  try { await fn(); ok = true; } catch { ok = false; }
  const pass = ok === shouldPass;
  if (!pass) failed++;
  console.log(`${pass ? 'PASS' : 'FAIL'}  ${name}`);
}
process.exit(failed ? 1 : 0);

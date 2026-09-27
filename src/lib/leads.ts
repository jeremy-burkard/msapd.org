import { addDoc, collection, getFirestore, serverTimestamp } from 'firebase/firestore/lite';
import { getFirebaseApp } from './firebase';
import type { LeadTopic } from './lead-topics';

export interface LeadInput {
  name: string;
  email: string;
  phone: string;
  topic: LeadTopic;
  instrument: string;
  message: string;
}

export async function submitLead(input: LeadInput): Promise<void> {
  const db = getFirestore(getFirebaseApp());
  await addDoc(collection(db, 'leads'), {
    ...input,
    source: 'landing',
    status: 'new',
    createdAt: serverTimestamp(),
  });
}

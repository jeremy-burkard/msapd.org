# Status

**2026-09-27:** The Phase 0 landing page is built to [content/landing.md](content/landing.md), with all brief copy, the FAQ (with FAQPage JSON-LD), the small-band section and the sticky mobile call-to-action. The build, type check and Firestore rules tests (`npm run test:rules`) all pass. The work is staged on `feature/requirements-and-landing` but not committed yet.

**Next:**
1. Create the Firebase project, add a web app, and create Firestore (`nam5`). Fill in `.env`, add `.firebaserc`, then `npm run deploy`.
2. Connect the custom domain msapd.org in Firebase Hosting and add the DNS records it gives.
3. Create the band Google account and add it as an Owner. Fill in the TODOs in [handover.md](handover.md).
4. Jeremy: rotate the MySQL password and revoke the Flickr API key that were exposed in the public repo's history.
5. Photos: the hero is 1024px wide (the brief asks for 1600px+). Get originals from Flickr or take a new group photo at rehearsal.

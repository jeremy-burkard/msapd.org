# Status

**2026-09-27: Phase 0 is live at https://msapd-org.web.app.**

- Firebase project `msapd-org` ("MSAPD Website") is on Jeremy's account (burkardsoftwarelabs@gmail.com) and uses the free Spark plan. The plan is to add or move to a band Google account later (see [handover.md](handover.md)).
- Firestore `(default)` database is in `nam5`, created in production mode. The deployed rules allow public, validated `create` on `leads` only.
- Web app "msapd.org" is registered. Its config lives in `.env` (git-ignored), and `.firebaserc` points at `msapd-org`.
- Deploy with `npm run deploy` (`firebase deploy --only hosting,firestore`). Storage is skipped until the Blaze plan.
- **Verified:** the home page, the 404 page, and the 301s from the old `.php` URLs. The interest form works end to end in headless Chrome against production, and the lead appeared in Firestore with a server timestamp (test leads deleted afterwards). Rules tests pass in the emulator (`npm run test:rules`).
- Note: the first live submit, made seconds after the rules deployed, was denied while the rules propagated. A retry about 30 seconds later worked.

**Next:**
1. **Custom domain (waiting on DNS):** `msapd.org` and `www.msapd.org` (which redirects to the apex) are registered in Firebase Hosting. DNS is on Cloudflare. The records must be **DNS only** (grey cloud), not proxied. Replace the old App Engine A/AAAA records with `A 199.36.158.100`, and add `TXT hosting-site=msapd-org`. Point `www` with a `CNAME` to `msapd-org.web.app`. Keep the MX, SPF and google-site-verification records. Check progress in Firebase console → Hosting.
2. Lead notifications: new leads currently only appear in the Firebase console (Firestore → `leads`). Phase 1 adds email, which needs Blaze plus the Trigger Email extension. Until then, check the console regularly.
3. Create the band Google account, add it as an Owner, and fill in the TODOs in [handover.md](handover.md).
4. Jeremy: rotate the MySQL password and revoke the Flickr API key that were exposed in the public repo's history.
5. Photos: the hero is 1024px wide (the brief asks for 1600px+). Get originals from Flickr or take a new group photo at rehearsal.

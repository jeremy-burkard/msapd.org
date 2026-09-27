---
status: draft
---

# msapd.org — Requirements

## 1. One-liner & elevator pitch

**The public home and members' back office for Maine St. Andrew's Pipes & Drums.**

MSAPD is a Bangor-area bagpipe band founded in 1994. Its membership has dropped to a handful of players. The old site (PHP on a retired App Engine runtime) went offline and hadn't been updated since 2018. The new msapd.org has three jobs:

1. **Recruit.** Turn a curious visitor into someone who shows up at rehearsal. Every public page leads to "Come to a practice."
2. **Honor the band's history.** Cover the lineage back to the Argyll Highlanders, Northern Border Caledonia and Acadian Pipes & Drums, the Maine State Tartan, and the people who played in the band.
3. **Run the band.** Give members a portal for gigs and sign-ups, their own profiles and bios, sheet music, and uniform and equipment inventory. Non-technical leaders can keep all public content up to date without touching code.

## 2. Users & contexts

| User | Context | Technical comfort |
|---|---|---|
| **Prospective recruit** | Found us on Facebook, through search, or from a QR code on the banner at a parade. Usually on a phone. Probably has never touched a practice chanter. | Any |
| **Returning or relocated player** | Experienced piper or drummer looking for a band in Maine. | Any |
| **Event organizer** | Wants to book pipes for a parade, wedding, funeral or memorial. | Any |
| **Alumni and family** | Looking for their own bio or a relative's, old photos, or history. | Any |
| **Member** | Checks upcoming gigs, RSVPs, downloads tunes, updates their own bio. Mostly on a phone. | Low to medium |
| **Leadership** (Pipe Major, Drum Major, business manager) | Creates gigs, posts news, edits public pages, manages inventory and recruits. **Some leaders are not technical at all.** | Low (design for this) |
| **Admin** (Jeremy) | Approves accounts, manages roles, handles anything unusual. | High |

## 3. Use cases

**UC1: Recruit expresses interest.** A visitor reads the Join page and submits the interest form (name, email or phone, instrument interest, experience, message).
- [ ] The form works on a phone, needs no account, and confirms on the page that it was received.
- [ ] Each submission becomes a `leads` record with status `new`. Leadership gets an email within a minute (the email notification is a Phase 1 item; the landing page ships storing leads only).
- [ ] Spam protection works without a CAPTCHA puzzle (honeypot field plus App Check).
- [ ] The rehearsal schedule and location are visible on the page without submitting anything.

**UC2: Leader publishes a public update without developer help.** Scott edits the rehearsal time, posts a news item, or adds a public appearance from the portal on his phone.
- [ ] Editing uses plain forms with labeled fields and a formatting toolbar (bold, italic, links, lists). No Markdown or HTML is required.
- [ ] Preview shows the change as it will look on the site before publishing.
- [ ] After **Publish**, the change is live on the public site within about 3 minutes, with no git, CLI or code involved.
- [ ] Every edit records who made it and when. The previous version can be restored.

**UC3: Leader schedules a gig and members sign up.** Leadership creates a gig with date, call time, location, uniform, tune list, contact person and a Public flag. Members respond Yes, No or Maybe.
- [ ] Members see upcoming gigs in date order and can RSVP in one tap.
- [ ] Leadership sees headcount split into pipers, drummers and drum major, and can see who hasn't responded.
- [ ] A gig marked Public appears on the public Events page, without the internal details.
- [ ] Members are emailed when a gig is created or changed (they can opt out).

**UC4: Member maintains their own profile and bio.** A member updates contact info, instrument, emergency contact, photo and public bio.
- [ ] Contact info and emergency contact are visible only to members.
- [ ] Bio changes go to leadership for approval before they appear publicly (this can be turned off).
- [ ] When a member leaves, leadership moves them to **Alumni**. Their bio stays public under "Alumni" with years of service. Nothing is deleted.
- [ ] The ~40 bios from the legacy site are imported as alumni or current records.

**UC5: Member downloads sheet music.** A member finds a tune or the current gig sets and downloads the PDF, or plays practice audio.
- [ ] The library can be searched by title, tune type (march, strathspey, reel, jig, slow air, hornpipe…) and set.
- [ ] Files require a login. No public URLs.
- [ ] Leadership uploads and replaces files. Each file records its source or permission note (only band-owned or licensed arrangements).

**UC6: Leader tracks uniforms and equipment.** Record each kilt, glengarry, sash, sporran, band drum, and loaner chanter or set of pipes, and who has it.
- [ ] Each item has a category, size, condition, photo, notes and current holder.
- [ ] Items can be checked out and returned, with history.
- [ ] Leadership sees everything a departing member still holds.

**UC7: Editor gets AI help writing content.** On any editor (bio, news, event, history entry, page text), a member clicks **Help me write**, describes what they want, and gets a draft in the band's voice.
- [ ] The AI draft goes into the editor for the person to review. It is never published automatically.
- [ ] The assistant knows band facts (founding 1994, lineage, tartan, rehearsal details) from a maintained style and facts document.
- [ ] Only logged-in members can use it, with a daily limit per person. The API key never reaches the browser.

**UC8: Visitor explores the band's history.** A visitor browses a timeline, the tartan story, past Pipe Majors and Drum Majors, alumni bios, and photos and video.
- [ ] Leadership can add timeline entries and alumni in the portal (UC2 flow).
- [ ] Photos are uploaded through the portal, resized automatically and captioned. They are not served from Flickr.

## 4. Data model

Firestore collections. Binary files live in Firebase Storage, and Firestore holds the metadata.

| Collection | Key fields | Read | Write |
|---|---|---|---|
| `members/{uid}` | name, email, phone, instrument (`pipes`/`snare`/`tenor`/`bass`/`drum-major`), role (`member`/`leader`/`admin`), status (`pending`/`active`/`alumni`), joinedYear, leftYear, emergencyContact, photoPath | members | self (limited fields), leadership |
| `bios/{id}` | memberId?, displayName, title (e.g. "Pipe Major"), body (rich text), photoPath, years, status (`current`/`alumni`/`memoriam`), approved | **public** if approved | self (draft), leadership |
| `pages/{slug}` | title, sections[], updatedBy, updatedAt | **public** | leadership |
| `settings/site` | rehearsal {days, time, place, address}, contactEmail, social links | **public** | leadership |
| `news/{id}` | title, body, publishedAt, pinned | **public** | leadership |
| `gigs/{id}` | title, date, callTime, startTime, location, mapUrl, uniform, tunes[], contactId, notes, isPublic, publicBlurb | members; the public projection is built into the static site | leadership |
| `gigs/{id}/rsvps/{uid}` | response (`yes`/`no`/`maybe`), instrument, note, updatedAt | members | self |
| `history/{id}` | year, title, body, imagePath, sort | **public** | leadership |
| `photos/{id}` | storagePath, sizes{}, caption, altText, album, takenAt, credit, isPublic | public if isPublic | leadership |
| `tunes/{id}` | title, type, sets[], storagePaths{pdf, audio}, source, permissionNote | members | leadership |
| `inventory/{id}` | category, label, size, condition, photoPath, holderId, notes | members | leadership |
| `inventory/{id}/checkouts/{id}` | holderId, outAt, returnedAt, by | members | leadership |
| `leads/{id}` | name, contact, interest, experience, message, status (`new`/`contacted`/`attended`/`apprentice`/`member`/`closed`), createdAt | leadership | **public create-only** (validated), leadership update |
| `revisions/{id}` | collection, docId, snapshot, by, at | leadership | system |

Storage paths: `public/photos/…` (public read), `members/tunes/…`, `members/docs/…`, `members/avatars/…` (members only).

## 5. Tech stack & constraints

| Concern | Choice |
|---|---|
| Public site | **Astro** (static output), **SCSS** design system. See [ADR-001](adrs/adr-001-astro-scss.md). |
| Member portal | Astro route `/members/*` with **React** islands (client-side, Firebase JS SDK). |
| Auth | **Firebase Auth**, email magic link. |
| Data | **Firestore**, with security rules per role. |
| Files and photos | **Firebase Storage** plus the **Resize Images** extension (thumb, web and full sizes). |
| Server logic | **Cloud Functions for Firebase**: email notifications, role claims, AI drafts, publish trigger. |
| Publishing | Content saves to Firestore. **Publish** calls a function that dispatches a GitHub Actions workflow, which builds Astro (reading Firestore through the Admin SDK) and deploys to Firebase Hosting. |
| Hosting | **Firebase Hosting**, custom domain msapd.org. |
| AI drafts | Claude API (`claude-opus-5`) called only from a Cloud Function, with the key in Secret Manager. |
| Email | Firebase "Trigger Email" extension with an SMTP provider (TBD). |

Constraints:
- **Cost stays near zero.** The Blaze plan is required for Functions and extensions, with a budget alert of about $10/month.
- **Mobile first.** Most visitors and members are on phones.
- **Accessibility:** WCAG 2.2 AA, with real alt text on every photo.
- **No secrets in the repo. Ever.** The legacy repo leaked a DB password and a Flickr key and is public.
- **The site keeps working if one person disappears.** Leadership can do all routine updates themselves.

## 6. Auth & access control

- **Public:** all public pages, approved bios, public photos, public gig blurbs. Can create `leads` only.
- **Pending:** a new sign-in with no approved membership sees "Waiting for approval" and nothing else.
- **Member** (`status: active`): portal read access, RSVPs, own profile and bio draft, sheet music, inventory view, AI drafts.
- **Leader:** everything a member can do, plus editing public content, gigs, inventory, tunes, leads and approving bios.
- **Admin:** everything a leader can do, plus role changes and account approval.
- Roles are stored on `members/{uid}` and mirrored to custom claims by a function, so rules can check them quickly.
- All public-write paths (`leads`) are validated in rules by field names, types and lengths, and protected by App Check.

## 7. Design direction

- **Mood:** proud, warm, welcoming, rooted. A band you'd want to stand beside, not a museum.
- **Adjectives:** heritage, confident, friendly, crisp, Maine.
- **Palette:** from the **Maine State Tartan** (1964): sky azure, deep water blue, forest green, and a thin red accent line, plus warm off-white and near-black for concert-stage photos.
- **Signature element:** a CSS-rendered Maine tartan sett used as dividers, accents and the footer band.
- **Type:** Uncial display face (echoing the band's bass-drum lettering) for the wordmark only. A readable serif for headings and a clean sans for body text.
- **Photography first:** real band photos. People playing and having fun.
- **Tone of copy:** "we're rebuilding and we'd love you to be part of it." The band hasn't competed in several years and hopes to again, which is a recruiting hook ("help us get back on the competition field").

## 8. Screen inventory

**Public:** Home · Join the Band · Our History (timeline, tartan, leadership through the years) · Alumni & Bios · Hire the Band · Events · Media (photos and video) · Contact.

**Portal:** Sign in · Pending approval · Dashboard (next gigs, announcements) · Gigs list and gig detail with RSVP · Directory · My profile and bio · Tunes library · Inventory · Leads · Content editors (pages, news, history, bios, photos, site settings) · Publish status · Admin (accounts, roles).

## 9. Planned updates

| Phase | Scope |
|---|---|
| **0: Landing page** *(built, awaiting deploy)* | One-page Astro site following [content/landing.md](content/landing.md): hero, "small band" pitch, how to join, FAQ, history, hiring, contact form (stores `leads`), sticky mobile call-to-action. Runs on Firebase's free Spark plan (Hosting + Firestore). Deployed to Firebase Hosting on msapd.org. |
| **1: Public site + portal core** | Full public pages from §8; auth and roles; content editors and the publish pipeline (UC2); gigs and RSVPs (UC3); profiles and bios with legacy import (UC4); tunes (UC5); lead email notifications. |
| **2: Operations** | Inventory (UC6), leads pipeline UI, documents, photo library UI (UC8). |
| **3: AI writing helper** | "Help me write" (UC7) with a facts and style document. Before that, use a Claude Project on claude.ai with the same facts document. |

## 10. Out of scope

- A public AI chatbot for visitors (a clear FAQ does this better, with no risk of wrong answers).
- Dues, payments or online booking payments.
- Competition results tracking (revisit if the band competes again).
- Native mobile apps (the site is mobile-first instead).
- Migrating the Flickr archive wholesale. Import curated favorites only and link to Flickr for the rest.

## Open questions

- **Firebase/GCP project:** not created yet. The agreed model is a band Google account as backstop owner, with Jeremy as a working owner (see [handover.md](handover.md)).
- **Domain:** Jeremy manages msapd.org DNS. Confirm the registrar and the auto-renew setting in handover.md.
- **Email:** which sending provider and "from" address (e.g. `info@msapd.org`)?
- **Rehearsal address:** exact street address or room for Bangor Parks & Rec (647 Main St?). Confirm before it goes on the page.

## Change Log

| Date | By | Change |
|---|---|---|
| 2026-09-27 | Claude Code | Phase 0 built to the content brief. Recorded the ownership model and that Phase 0 runs on the free Spark plan (Storage deferred to Phase 1, since new buckets need Blaze) |
| 2026-09-27 | Claude Code | Initial requirements from the site review and Jeremy's answers (founding 1994, rehearsals 1st/3rd Thursdays at Bangor Parks & Rec, public alumni bios, non-technical editors, AI writing helper, Astro + SCSS + Firestore + Storage) |

# If Jeremy is unavailable: msapd.org handover

This page is for band leadership, and for any developer (or AI coding assistant) the band brings in. Keep a printed copy with the band's records.

## What the site is

- **msapd.org** is the band's public website. It covers recruiting, history and booking inquiries.
- It is a standard, well-documented setup: an **Astro** static site hosted on **Google Firebase**, with the code on **GitHub**. Any web developer can pick it up.
- Starting in Phase 1, day-to-day updates (rehearsal times, news, events, bios, photos) happen in the **members' portal** on the website itself. **No programming is needed for routine changes.**

## Where everything lives

| Thing | Where | Who has access |
|---|---|---|
| Band Google account | `TODO: band account email` | Jeremy, `TODO: officer 1`, `TODO: officer 2` (password in `TODO: where the credentials are kept`) |
| Firebase project (hosting, database, files) | [console.firebase.google.com](https://console.firebase.google.com), project `msapd-org` ("MSAPD Website") | Owner: Jeremy (burkardsoftwarelabs@gmail.com). **TODO:** add the band Google account as Owner |
| Code | GitHub, `TODO: org/repo (currently jeremy-burkard/msapd.org)` | Owners: band Google account, Jeremy |
| Domain msapd.org | Registrar: `TODO: registrar`. Renews `TODO: date`, auto-renew `TODO: on/off` | `TODO` |
| Interest-form submissions | Firebase console → Firestore → `leads` collection (until the portal ships) | Firebase project owners |
| Billing | None yet. The site runs on Firebase's free plan. Phase 1 needs the pay-as-you-go plan on a band card, with a budget alert. | `TODO` |

**The most important thing:** make sure at least two people can sign in to the band Google account. Every other account can be recovered through it.

## Routine tasks without a developer

- **Read interest-form messages:** Firebase console → Firestore Database → `leads`. Reply by email or phone.
- **Keep the domain renewed:** check the registrar each year, or turn on auto-renew with a band card.
- Everything else routine moves into the members' portal in Phase 1.

## Bringing in a developer or Claude Code

Point them at this repository and ask them to read, in order:

1. `README.md`: how to run, build and deploy.
2. `CLAUDE.md`: orientation notes. Claude Code reads this automatically.
3. `docs/requirements.md`: what the site does and why.
4. `docs/adrs/`: key technical decisions.
5. `docs/status.md`: where work left off.

Give them **Editor** access to the Firebase project and write access to the GitHub repo, using their own accounts. Never share the band account password with a contractor.

To deploy a change: `npm install`, copy the web config into `.env` (see `.env.example`), then run `npm run deploy` while signed in to the Firebase CLI with an account that has access to the project.

## Change Log

| Date | By | Change |
|---|---|---|
| 2026-09-27 | Claude Code | Created, with the ownership model (band Google account as backstop owner, Jeremy as working owner) |

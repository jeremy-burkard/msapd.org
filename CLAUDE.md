# CLAUDE.md

This is "msapd.org" in Jeremy's Dev Studio pipeline.

At session start, read `D:\Repositories\STATUS.md` for the portfolio
overview, then `D:\Repositories\dev-studio\docs\README.md` for
conventions, then this repo's `docs\` folder for requirements,
architecture, and ADRs.

## Notes
- Stack deviates from the framework default. It uses Astro + SCSS, not a React SPA + Tailwind (see `docs/adrs/adr-001-astro-scss.md`).
- `legacy/` is the retired PHP site (App Engine php55, offline), kept only as a content source for migration. It is not built or deployed. The untouched original is tagged `legacy-php-site`.
- The GitHub repo is **public**. Never commit secrets. Firebase web config is public by design and goes in `.env` (`PUBLIC_FIREBASE_*`), but server keys (Claude API, SMTP) go in Secret Manager.
- Styles: `src/styles/` (tokens → base → components). The Maine State Tartan mixin lives in `src/styles/_tartan.scss`.

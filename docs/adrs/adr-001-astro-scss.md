# ADR-001: Astro + SCSS instead of the framework's React SPA + Tailwind default

**Decision status:** accepted
**Date:** 2026-09-27
**Scope:** App-specific

## Context

The Dev Studio framework's core frontend stack is React 18 + Vite + TypeScript + Tailwind, deployed as a single-page app. msapd.org is different from Jeremy's other apps in two ways:

1. **Most of its value is public, and it has to be found.** Recruitment depends on search ("bagpipe lessons Bangor Maine") and on link previews when posts are shared on Facebook. A client-rendered SPA serves an empty shell to crawlers and preview bots.
2. **It is content-heavy, and non-technical people edit it.** Pages are mostly text and photos. Interactive behaviour is limited to forms and the member portal.

Jeremy also enjoys writing SCSS and wants a carefully crafted visual identity (the Maine State Tartan, heritage typography), not a utility-class look.

## Decision

- Use **Astro** with static output for the whole site. Public pages are fully rendered HTML.
- Build the **member portal** (`/members/*`) as **React islands** inside Astro, running client-side against Firebase. This keeps the framework's React and TypeScript skills and patterns.
- Use **SCSS** (Dart Sass, `sass` package) for styling instead of Tailwind. Design tokens are CSS custom properties generated from SCSS maps, with partials per layer (`tokens`, `base`, `components`, `utilities`).
- The rest of the framework stack is unchanged: Firebase Hosting, Firebase Auth (magic link), Firestore, TypeScript, GitHub Flow.
- Public content is stored in Firestore. **Publishing rebuilds the static site** (GitHub Actions `workflow_dispatch` triggered by a Cloud Function), so pages stay static and fast.

## Consequences

- Public pages are fast, crawlable and preview-friendly, with no JS shipped by default.
- Content changes take a rebuild (about 2–3 minutes) to appear, rather than appearing instantly. That's acceptable for a band site, and the portal shows publish status.
- This repo needs its own GitHub Actions deploy workflow before the framework's shared ADR-004 workflow exists. Design it so it can later become a thin caller of that shared workflow.
- Claude Design and Claude Code sessions should expect SCSS partials and tokens, not Tailwind classes.

## Change Log

| Date | By | Change |
|---|---|---|
| 2026-09-27 | Claude Code | Created: Astro static + React islands for the portal, SCSS instead of Tailwind |

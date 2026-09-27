# msapd.org

Website for **Maine St. Andrew's Pipes & Drums**, a Highland pipe band in Bangor, Maine.

- Public site: [Astro](https://astro.build) (static) with an SCSS design system
- Data: Firebase (Firestore, Storage, Auth), hosted on Firebase Hosting
- Docs: [requirements](docs/requirements.md) · [ADRs](docs/adrs/) · [status](docs/status.md)
- `legacy/` holds the retired PHP site, kept as a source for content migration

## Develop

```sh
npm install
cp .env.example .env   # fill in the Firebase web config
npm run dev            # http://localhost:4321
npm run build          # type-check + static build to dist/
npm run test:rules     # Firestore security rules against the emulator (needs Java)
```

## Deploy

```sh
firebase use <project-id>
npm run deploy         # hosting + Firestore/Storage rules
```

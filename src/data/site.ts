// Site facts for the Phase 0 landing page (confirmed in docs/content/landing.md).
// In Phase 1 these move to the Firestore `settings/site` document so leadership
// can edit them in the portal.

export const site = {
  name: "Maine St. Andrew's Pipes & Drums",
  shortName: 'MSAPD',
  founded: 1994,
  origin: 'Northern Border Caledonia and Acadian Pipes & Drums',
  city: 'Bangor, Maine',
  seoTitle: "Free Bagpipe & Drum Lessons in Bangor, Maine | Maine St. Andrew's Pipes & Drums",
  description:
    "Maine St. Andrew's Pipes & Drums offers free bagpipe and drum lessons in Bangor, Maine. No experience needed. Join us at rehearsal on the 1st and 3rd Thursdays.",
  rehearsal: {
    days: '1st & 3rd Thursdays',
    time: '6:30–8:00 pm',
    place: 'Bangor Parks & Recreation',
    city: 'Bangor, Maine',
    // Exact room/address still open (see docs/requirements.md).
    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Bangor+Parks+and+Recreation+Bangor+Maine',
  },
  joining: {
    instruction: 'Free for anyone interested in joining the band',
    loaners: true,
    uniform: 'The band provides most of it. Members supply their own white shirt.',
    minimumAge: null, // children come with a parent, at least at first
  },
  facebookUrl: 'https://www.facebook.com/pages/Maine-St-Andrews-Pipes-Drums/321199238469',
  flickrUrl: 'https://www.flickr.com/photos/msapd',
} as const;

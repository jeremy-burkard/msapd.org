// Plain constants (no Firebase imports) so pages can use them without
// pulling the Firestore SDK into the initial bundle.

export const LEAD_TOPICS = {
  learn: 'Learn to play',
  experienced: 'Join as an experienced player',
  booking: 'Book the band',
  other: 'Something else',
} as const;

export type LeadTopic = keyof typeof LEAD_TOPICS;

/** Field limits, mirrored in firestore.rules. Keep them in sync. */
export const LIMITS = { name: 100, email: 200, phone: 40, instrument: 40, message: 2000 } as const;

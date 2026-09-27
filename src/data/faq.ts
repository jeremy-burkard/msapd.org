// Single source for the FAQ section and its FAQPage JSON-LD, so they never drift.
// Copy from docs/content/landing.md §4.

export interface Faq {
  q: string;
  a: string;
}

export const faq: Faq[] = [
  {
    q: 'Is it really free?',
    a: "Yes. Instruction is free for anyone interested in joining the band. We can lend you an instrument to get started, and the band provides most of the uniform. The only thing you’ll need to supply is a white shirt.",
  },
  {
    q: "I’ve never played music before. Can I still learn?",
    a: 'Absolutely. Most of our members started with no musical background at all. We teach you to read pipe music and play from the very first note.',
  },
  {
    q: 'Do I need to buy bagpipes or a drum?',
    a: 'Not to get started. New pipers spend their first months on a practice chanter, and new drummers on a practice pad. We have loaners available so you can try it before you spend anything.',
  },
  {
    q: 'How long before I can play with the band in public?',
    a: "Everyone learns at their own pace. Some pipers are ready to play out with the band in under a year, and it’s perfectly normal to take longer. We’ll never rush you onto the parade route before you’re ready.",
  },
  {
    q: 'Is there an age requirement?',
    a: 'There is no minimum age. Children are welcome and should come with a parent, at least for the first few rehearsals.',
  },
  {
    q: 'Is this a family-friendly group?',
    a: "Yes. We’re a pipe band first and last, and our rehearsals and performances are all about the music. Families are always welcome.",
  },
  {
    q: 'Do I need Scottish heritage to join?',
    a: 'Not at all. All you need is a love of the sound of the pipes and drums.',
  },
  {
    q: 'I already play. Can I join?',
    a: "Yes, and we’d be glad to have you. Come to a rehearsal and play a set with us.",
  },
];

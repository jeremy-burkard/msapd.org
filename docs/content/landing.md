---
status: approved for implementation
scope: Phase 0 temporary landing page (until the full public site ships)
author: Claude (claude.ai) with Jeremy
date: 2026-09-27
---

# Landing page content brief

This brief is the source of truth for **copy and section order** on the Phase 0
landing page. Keep the existing design system (tokens, tartan mixins, components)
and change the content and structure as described here. Wherever the brief gives
copy, use it word for word unless it breaks the layout. If it does, flag it rather
than rewriting.

## Voice rules

- **Traditional organization, rooted in history.** The overall feel is a proud,
  established band with three decades behind it, not a startup or a party band.
  Favor dignified, plain language over slang or hype.
- **Complete sentences for body copy.** Paragraphs, FAQ answers and card text use
  full sentences. **Headlines, buttons, eyebrows and taglines may use short
  marketing fragments** (e.g. "Free lessons. No experience needed.") when they
  land harder than a sentence. Use them sparingly, about one or two per section at most.
  If a fragment sounds flippant or trendy, rewrite it.
- **Short paragraphs.** Most readers are on phones. Keep paragraphs to 1–3 sentences.
- **Honest and warm.** We are a small band that is rebuilding. Say so plainly and
  treat it as an invitation, not an apology.
- **Family-friendly and dignified.** We are a pipe band first and last. There are no drinking jokes and no
  "party band" framing.
- Say "Bangor, Maine" naturally in visible text for local SEO. Don't stuff it.

## Confirmed facts (update `src/data/site.ts` to match)

| Fact | Value |
|---|---|
| Founded | **1994** (the legacy site's "1996" is wrong) |
| Origin | Formed from Northern Border Caledonia and Acadian Pipes & Drums |
| Rehearsals | 1st & 3rd Thursdays, 6:30–8:00 pm, Bangor Parks & Recreation *(exact room/address still open; see requirements.md)* |
| Instruction | Free for anyone interested in joining the band |
| Loaner instruments | Yes, available to get new players started |
| Uniform | The band provides most of it. Members supply their own white shirt. |
| Time to play out | Some pipers are ready in under a year; longer is normal |
| Age | No minimum age. Children come with a parent, at least at first. |
| Tone | Family-friendly |

## Page order

1. Header (unchanged)
2. **Hero**: revised copy
3. **Small band, room for you**: NEW section
4. **How it works** (`JoinSection`): revised copy, same layout
5. **Questions people ask** (FAQ): NEW section
6. **Our story** (`StorySection`): light edits
7. **Hire the band** (`HireSection`): light edits
8. **Contact** (`ContactSection`): light edits
9. Footer: add name, address and phone, plus Facebook
10. **Sticky mobile CTA bar**: NEW

---

## 1. Hero

- Band line (small, above H1): **Maine St. Andrew's Pipes & Drums · Bangor, Maine**
- H1: **Learn the bagpipes and drums for free, right here in Bangor.**
  - Acceptable alternate (marketing fragment): **Free bagpipe and drum lessons in Bangor.**
    Pick whichever fits the hero layout better. Both carry the SEO keywords.
- Tagline under H1 (optional, fragment OK): **A Maine pipe band since 1994.**
- Lede:
  > We teach Highland piping and drumming at no cost to anyone who would like to
  > join the band. You don't need any experience or your own instrument. All you
  > need to do is come to a practice.
- Primary button: **Come to a practice** → `#join`
- Secondary button: **Book the band** → `#hire`
- Keep the rehearsal chip as is.

## 2. Small band, room for you (NEW)

Short, light-background section with one photo (candidate: a group or "Members"
shot from Flickr, see Photos below). Heading plus two short paragraphs.

- Eyebrow: **Why now**
- H2: **We're a small band with a big sound, and there's room for you.**
- Body:
  > Maine St. Andrew's has played across Maine since 1994. Our ranks have grown
  > small in recent years, and we're rebuilding. We think that makes this the
  > best time to join.
  >
  > In a small band, you won't get lost in the back row. You'll learn one-on-one
  > from players with decades of experience, and you'll have a real voice in where
  > the band goes next. Our goal is to return to the competition field, and we'd
  > love your help getting there.

## 3. How it works (`JoinSection`)

- Eyebrow: **Join the band**
- H2: **You don't need any experience to start.**
- Intro:
  > Nearly every piper and drummer in the band started exactly where you are now.
  > We'll teach you at no cost, alongside people who love this music and want to
  > share it.

Steps:

1. **Come to a rehearsal.** Stop by, listen, meet the band, and ask us anything.
   There is no audition and no commitment.
2. **Learn the basics.** Pipers begin on a practice chanter and drummers on a
   practice pad. We have loaner instruments to get you started, and band members
   teach you for free at rehearsal.
3. **March out with the band.** When you're ready, you'll join us at parades,
   concerts and festivals. The band provides most of the uniform, so you'll only
   need to bring a white shirt.

Rehearsal card: keep it, and add this line above the button:
> Please drop us a note before your first visit so someone is watching for you
> at the door.

Button: **Tell us you're coming** (unchanged, preselects "Learn to play").

"Already play?" card:
> Have you moved to Maine, or are you ready to dust off your pipes or sticks?
> Experienced pipers and drummers are always welcome. Come and play a set with us.

"Where we've played" card: add this intro sentence, then keep the list as is.
> Over the years, we've been proud to play at events like these.

## 4. Questions people ask (NEW)

Use native `<details>`/`<summary>` for an accordion. It needs no JS, works for everyone and
is accessible. Output matching `FAQPage` JSON-LD (see SEO). Questions are in this order:

**Is it really free?**
> Yes. Instruction is free for anyone interested in joining the band. We can lend
> you an instrument to get started, and the band provides most of the uniform.
> The only thing you'll need to supply is a white shirt.

**I've never played music before. Can I still learn?**
> Absolutely. Most of our members started with no musical background at all. We
> teach you to read pipe music and play from the very first note.

**Do I need to buy bagpipes or a drum?**
> Not to get started. New pipers spend their first months on a practice chanter,
> and new drummers on a practice pad. We have loaners available so you can try it
> before you spend anything.

**How long before I can play with the band in public?**
> Everyone learns at their own pace. Some pipers are ready to play out with the
> band in under a year, and it's perfectly normal to take longer. We'll never rush
> you onto the parade route before you're ready.

**Is there an age requirement?**
> There is no minimum age. Children are welcome and should come with a parent, at
> least for the first few rehearsals.

**Is this a family-friendly group?**
> Yes. We're a pipe band first and last, and our rehearsals and performances are
> all about the music. Families are always welcome.

**Do I need Scottish heritage to join?**
> Not at all. All you need is a love of the sound of the pipes and drums.

**I already play. Can I join?**
> Yes, and we'd be glad to have you. Come to a rehearsal and play a set with us.

Close the section with a small CTA line and button:
> Do you have a question we didn't answer? **[Ask us](#contact)**

## 5. Our story (`StorySection`)

The timeline and tartan card are good. Make these edits:

- H2: **Three decades of pipes and drums in Maine.** (add the period to match voice)
- "Before" entry body:
  > Northern Border Caledonia, which grew out of the Argyll Highlanders, and
  > Acadian Pipes & Drums carried Highland piping across Downeast and Central Maine.
- 1994 entry title: **Maine St. Andrew's is formed.** Body unchanged.
- "Today" entry:
  > We're a small band with a long memory, and we're rebuilding our ranks. We hope
  > to return to the competition field someday, and we'd love you to be part of it.
- Lede: replace "stoneworkers" with a less oddly specific list:
  > Generations of players have worn the band's tartan, including teachers,
  > tradespeople, students and veterans, all bound by a love of the pipes.

## 6. Hire the band (`HireSection`)

- H2: **Would you like pipes for your occasion?**
- Add one intro sentence under the heading:
  > We play for civic events, memorials, weddings and more, from a single piper to
  > the full band.
- Occasion cards: keep, but make each body a complete sentence:
  - Parades & civic events: "We march in Memorial Day and Fourth of July parades, town days and dedications."
  - Memorials & funerals: "A lone piper or the full band can play with care and dignity."
  - Weddings & celebrations: "We can pipe in the bride, lead the procession, or surprise your guests."
  - Festivals & schools: "We perform at Celtic festivals and concerts, and we offer hands-on programs for students."

## 7. Contact (`ContactSection`)

- H2: **We'd love to hear from you.**
- Lede:
  > Whether you're thinking about learning, looking for a band, or hoping to book
  > pipes for an event, send us a note. A band member will get back to you soon.
- Everything else is unchanged.

## 8. Footer

Add a consistent name, address and phone block, for local SEO. It must match the Google Business Profile exactly:
- Maine St. Andrew's Pipes & Drums
- Bangor, Maine *(add a street address only once one is confirmed)*
- Facebook link
- © year, "Est. 1994"

## 9. Sticky mobile CTA (NEW)

On small screens only, show a slim bar fixed to the bottom with the text **Come to a practice**
linking to `#join`. Hide it while `#join` or `#contact` is in view (IntersectionObserver),
so it never covers the form. Respect `prefers-reduced-motion`. Pad the bottom of `body`
so the footer isn't hidden.

---

## SEO

- `<title>`: `Free Bagpipe & Drum Lessons in Bangor, Maine | Maine St. Andrew's Pipes & Drums`
- Meta description:
  `Maine St. Andrew's Pipes & Drums offers free bagpipe and drum lessons in Bangor, Maine. No experience needed. Join us at rehearsal on the 1st and 3rd Thursdays.`
- JSON-LD in `Base.astro` (or on the index page):
  - `MusicGroup`: name, url, foundingDate `1994`, genre `Highland bagpipe music`,
    `location` (Bangor, ME), `sameAs` [Facebook, Flickr].
  - `FAQPage`: generated from the same FAQ data array the component renders, so they
    never drift apart. Put the array in `src/data/faq.ts`.
- OG image: the best new hero photo at 1200×630.

## Photos

The current five photos are from about 2007–2010 and are all fine. Better candidates live in
the band's Flickr account (`flickr.com/photos/msapd`, 394 photos, 2005–2011) and on
Facebook. Jeremy picks the final photos. Look first in these albums:

- **Favorites** (album 72157616047587045)
- **Members** (72157617048937693), for the "Small band" section
- **2007 / 2008 Fort Knox Tattoo**, for dramatic settings
- **2009 / 2010 Bangor–Brewer Fourth of July parade**, which are local and help SEO alt text
- **2010 Colonial Pemaquid**

Selection criteria, in priority order:
1. Faces visible and people clearly **enjoying** it. Smiles beat perfect posture.
2. The full band or a group, to show there's a community to join.
3. The Maine State Tartan clearly visible.
4. A recognizable Maine setting (Fort Knox, Bangor waterfront, the coast).
5. At least 1600px wide for the hero.

When a current group photo is taken at rehearsal, it replaces the "Small band"
image. That shot is the top priority for recruiting.

Every photo needs real alt text that describes the people and the place, and mentions Bangor or Maine where it's
true.

## Out of scope for Phase 0

The News, Events list, alumni bios and the portal all wait for Phase 1.

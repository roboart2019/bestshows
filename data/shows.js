// Best Shows — flat data file (replace with database in production)
// Content Advisories use the naming from BestShows original site

const CONTENT_ADVISORIES = [
  'Violence',
  'Graphic Violence',
  'Strong Language',
  'Sexual Content',
  'Nudity',
  'Drug Use',
  'Alcohol Use',
  'Suicide / Self-Harm',
  'Mental Health Themes',
  'Child Abuse',
  'Domestic Violence',
  'Animal Cruelty',
  'Racism / Discrimination',
  'Sexual Assault',
  'Death of a Child',
  'Flashing Lights',
  'Torture',
  'War Violence',
  'Addiction',
  'Emotional Abuse'
];

const TV_RATINGS = {
  'TV-Y':  'Suitable for all children',
  'TV-Y7': 'Suitable for ages 7 and up',
  'TV-G':  'General audience',
  'TV-PG': 'Parental guidance suggested',
  'TV-14': 'Parents strongly cautioned — ages 14+',
  'TV-MA': 'Mature audiences only — ages 17+',
  'G':     'General audiences (film)',
  'PG':    'Parental guidance suggested (film)',
  'PG-13': 'Parents strongly cautioned — ages 13+ (film)',
  'R':     'Restricted — ages 17+ with parent/guardian (film)',
  'NC-17': 'Adults only — no one 17 and under admitted (film)'
};

// Critic rating dimensions:
//   story        — writing, narrative structure, pacing, dialogue
//   performances — acting, casting, character depth
//   craft        — direction, cinematography, score, production design
//   rewatchability — how well it holds up on repeat viewings

const shows = [
  {
    id: 'severance',
    title: 'Severance',
    type: 'TV',
    year: '2022–Present',
    platform: 'Apple TV+',
    seasons: '2 Seasons',
    officialRating: 'TV-MA',
    criticsScore: 9.5,
    ratings: { story: 9.4, performances: 9.2, craft: 9.8, rewatchability: 8.5 },
    genres: ['Thriller', 'Mystery', 'Drama', 'Sci-Fi'],
    contentAdvisories: ['Violence', 'Mental Health Themes', 'Suicide / Self-Harm', 'Strong Language'],
    excerpt: 'A masterclass in atmosphere and tension. The show explores work-life balance through a terrifying premise with production design that feels sterile and sinister.',
    review: `A masterclass in atmosphere and tension. The show explores work-life balance through a terrifying premise: employees undergo a "severance" procedure that splits their memories between work and personal life. The production design feels sterile and sinister in equal measure, with every hallway and elevator shaft oozing unease.\n\nAdam Scott delivers a career-best performance, balancing quiet despair with moments of fragile humanity. The mystery unfolds with surgical precision, revealing just enough to keep you hooked but never over-explaining. The soundtrack is an instrument of dread.\n\nSeason 1 is a near-perfect thriller. Season 2 expands the world while deepening the philosophical questions about identity, autonomy, and what it means to truly "live." If you love slow-burn psychological horror with sharp social commentary, this is essential viewing.`
  },
  {
    id: 'the-leftovers',
    title: 'The Leftovers',
    type: 'TV',
    year: '2014–2017',
    platform: 'HBO',
    seasons: '3 Seasons',
    officialRating: 'TV-MA',
    criticsScore: 9.0,
    ratings: { story: 9.5, performances: 9.8, craft: 9.2, rewatchability: 8.0 },
    genres: ['Drama', 'Mystery', 'Supernatural'],
    contentAdvisories: ['Violence', 'Suicide / Self-Harm', 'Mental Health Themes', 'Strong Language', 'Sexual Content', 'Drug Use'],
    excerpt: 'Three years after 2% of the world vanishes, this series asks what it means to keep living when you don\'t know why. Season 2 remains one of television\'s most profound achievements.',
    review: `Three years after 2% of the global population suddenly vanishes, The Leftovers follows those left behind — grief-stricken, angry, searching. It is one of the most emotionally ambitious shows ever made.\n\nBased on Tom Perrotta's novel, Damon Lindelof transforms the premise into a meditation on grief, faith, and survival. Season 1 is bleak and uncompromising. Season 2 — set in the mysteriously untouched town of Jarden, Texas — is a masterpiece. Season 3 goes cosmic and beautiful.\n\nCarrie Coon, Justin Theroux, and Regina King anchor the show with devastating performances. The Leftovers doesn't offer comfort or answers — it offers company in the dark. That's rarer and more valuable.`
  },
  {
    id: 'dune-part-two',
    title: 'Dune: Part Two',
    type: 'Film',
    year: '2024',
    platform: 'Theaters / Max',
    seasons: null,
    officialRating: 'PG-13',
    criticsScore: 9.2,
    ratings: { story: 8.5, performances: 9.0, craft: 9.9, rewatchability: 9.2 },
    genres: ['Sci-Fi', 'Epic', 'Adventure'],
    contentAdvisories: ['Violence', 'War Violence', 'Strong Language'],
    excerpt: 'Denis Villeneuve\'s epic conclusion is a technical marvel — a film that demands the biggest screen possible and rewards it with some of the most stunning imagery in modern cinema.',
    review: `Denis Villeneuve completes his adaptation of Frank Herbert's Dune with a film of staggering visual ambition. Where Part One was establishment, Part Two is escalation: the politics sharpen, the violence intensifies, and the moral critique of messianic narratives comes into full focus.\n\nTimothée Chalamet and Zendaya finally share the screen meaningfully, and both are excellent. Austin Butler's Feyd-Rautha is a menacing highlight — all coiled menace and pale-eyed threat. The Harkonnen sequences, shot in stark monochrome, are among the most distinctive images Villeneuve has put to film.\n\nGreig Fraser's cinematography and Hans Zimmer's score work in terrifying harmony. This is blockbuster filmmaking at its most serious and ambitious. The ending resists easy triumph. That's the point.`
  },
  {
    id: 'challengers',
    title: 'Challengers',
    type: 'Film',
    year: '2024',
    platform: 'Theaters / Prime Video',
    seasons: null,
    officialRating: 'R',
    criticsScore: 8.8,
    ratings: { story: 8.8, performances: 9.5, craft: 9.2, rewatchability: 8.5 },
    genres: ['Drama', 'Romance', 'Sports'],
    contentAdvisories: ['Sexual Content', 'Strong Language'],
    excerpt: 'A taut, sensual drama where tennis matches become love triangles. The editing pulses like a heartbeat, and Zendaya commands every frame she\'s in.',
    review: `Luca Guadagnino's Challengers is a film about desire, competition, and the stories we tell ourselves about our own lives. Three people — a tennis star, her husband, and his old best friend — orbit each other across thirteen years in a structure that's non-linear, playful, and devastating.\n\nZendaya is extraordinary. This is a star performance: controlled, sensual, and devastating by turns. Josh O'Connor and Mike Faist match her every step.\n\nTrent Reznor and Atticus Ross's score is a character in itself — drilling into every scene, refusing to let you settle. Guadagnino stages the tennis matches as foreplay, combat, and therapy simultaneously. By the climax, you're not sure who you're rooting for — and that ambiguity is the whole point.`
  },
  {
    id: 'the-bear',
    title: 'The Bear',
    type: 'TV',
    year: '2022–Present',
    platform: 'Hulu / Disney+',
    seasons: '3 Seasons',
    officialRating: 'TV-MA',
    criticsScore: 9.4,
    ratings: { story: 9.0, performances: 9.5, craft: 9.8, rewatchability: 9.0 },
    genres: ['Drama', 'Comedy', 'Slice-of-Life'],
    contentAdvisories: ['Strong Language', 'Mental Health Themes', 'Drug Use', 'Alcohol Use', 'Violence', 'Emotional Abuse'],
    excerpt: 'High-stakes kitchen drama filmed with the intensity of a war movie. Transforms into something richer — a portrait of community, trauma, and redemption.',
    review: `The Bear is one of the most formally ambitious shows on television, disguised as a restaurant drama. Christopher Storer shoots kitchen service like a military operation — tight, frantic, and terrifying.\n\nJeremy Allen White is exceptional as Carmen "Carmy" Berzatto, a fine-dining chef who inherits his late brother's Chicago sandwich shop. The supporting ensemble — Ayo Edebiri, Ebon Moss-Bachrach, Lionel Boyce — is equally brilliant.\n\nSeason 2's episode "Fishes" — a chaotic, anxiety-inducing family Christmas dinner — is one of the finest single episodes in television history. The Bear doesn't moralize or resolve tidily. It just captures, with terrifying accuracy, what it means to work in a kitchen, grieve a sibling, and try to build something beautiful out of wreckage.`
  },
  {
    id: 'parasite',
    title: 'Parasite',
    type: 'Film',
    year: '2019',
    platform: 'Various streaming',
    seasons: null,
    officialRating: 'R',
    criticsScore: 9.1,
    ratings: { story: 9.8, performances: 9.5, craft: 9.5, rewatchability: 9.5 },
    genres: ['Thriller', 'Dark Comedy', 'Drama'],
    contentAdvisories: ['Violence', 'Graphic Violence', 'Strong Language'],
    excerpt: 'Bong Joon-ho\'s genre-bending masterpiece. Funny, tense, and socially sharp — it never misses.',
    review: `Parasite is a perfect film. Not a great film, not a near-perfect film — perfect. Bong Joon-ho constructs a class warfare thriller that works simultaneously as dark comedy, horror, and social tragedy, with a screenplay so tight it feels inevitable in retrospect.\n\nThe Kim family infiltrate the wealthy Park household one by one, each posing as an unrelated professional. What follows is an escalation so well-engineered that every reveal feels both shocking and entirely logical.\n\nThe film's control of tone is extraordinary — it's genuinely funny, then viscerally disturbing, then heartbreaking, sometimes within the same scene. Song Kang-ho's performance as Ki-taek is quietly devastating. Winner of the Palme d'Or and four Academy Awards including Best Picture. Required viewing.`
  },
  {
    id: 'breaking-bad',
    title: 'Breaking Bad',
    type: 'TV',
    year: '2008–2013',
    platform: 'Netflix',
    seasons: '5 Seasons',
    officialRating: 'TV-MA',
    criticsScore: 9.8,
    ratings: { story: 9.8, performances: 9.7, craft: 9.5, rewatchability: 9.2 },
    genres: ['Crime', 'Drama', 'Thriller'],
    contentAdvisories: ['Violence', 'Graphic Violence', 'Drug Use', 'Strong Language', 'Torture', 'Death of a Child'],
    excerpt: 'The transformation of a high school chemistry teacher into a drug kingpin, told across five seasons of near-flawless television. The gold standard of prestige drama.',
    review: `Breaking Bad is the gold standard. Five seasons of television in which almost nothing is wasted, where every choice compounds, and where the moral stakes feel genuinely real.\n\nBryan Cranston's Walter White is one of American fiction's great antiheroes — a man who tells himself he's doing this for his family while becoming exactly the kind of monster he would have condemned. Aaron Paul's Jesse Pinkman provides the show's soul: its emotional core and its conscience.\n\nVince Gilligan plots with extraordinary precision. The show's ability to escalate while remaining internally consistent is unmatched. The final half-season in particular is a masterwork of payoff. Still the benchmark against which every subsequent prestige drama is measured.`
  },
  {
    id: 'the-wire',
    title: 'The Wire',
    type: 'TV',
    year: '2002–2008',
    platform: 'Max',
    seasons: '5 Seasons',
    officialRating: 'TV-MA',
    criticsScore: 9.7,
    ratings: { story: 9.8, performances: 9.8, craft: 9.5, rewatchability: 8.5 },
    genres: ['Crime', 'Drama', 'Social Commentary'],
    contentAdvisories: ['Violence', 'Drug Use', 'Strong Language', 'Racism / Discrimination', 'Child Abuse', 'Death of a Child'],
    excerpt: 'The greatest television drama ever made. A systemic portrait of Baltimore — police, drug trade, schools, docks, media — that indicts institutions rather than individuals.',
    review: `The Wire is not just great television — it is a work of social literature. David Simon and Ed Burns built a portrait of Baltimore so comprehensive, so unsparing, and so humanist that it still holds up as an indictment of American institutional failure.\n\nEach season takes a different institution: the drug trade and police department, the docks, city government, schools, media. Each is shown to be failing — not because of individual corruption but because the systems themselves are broken.\n\nThe show's greatest achievement is its refusal to offer heroes or villains. Stringer Bell is brilliant and murderous. Jimmy McNulty is principled and self-destructive. Omar Little is a thief with a code and a poet's soul. These aren't characters — they're people. No TV drama has matched The Wire's scope or moral seriousness.`
  },
  {
    id: 'succession',
    title: 'Succession',
    type: 'TV',
    year: '2018–2023',
    platform: 'Max',
    seasons: '4 Seasons',
    officialRating: 'TV-MA',
    criticsScore: 9.3,
    ratings: { story: 9.5, performances: 9.8, craft: 9.2, rewatchability: 9.0 },
    genres: ['Drama', 'Dark Comedy', 'Satire'],
    contentAdvisories: ['Strong Language', 'Sexual Content', 'Drug Use', 'Alcohol Use', 'Emotional Abuse'],
    excerpt: 'Shakespearean dysfunction among the ultra-wealthy. The finest ensemble on television, writing that crackles, and a finale that earns every emotion it demands.',
    review: `Succession is the defining prestige drama of the 2020s: a Shakespearean study of power, inheritance, and the damage parents do to children — staged among the grotesquely wealthy.\n\nThe Roy siblings — Kendall, Siobhan, Roman — are simultaneously pitiable and despicable. Brian Cox's Logan Roy is one of TV's all-time great monsters: a patriarch who makes his children fight for love he'll never actually give. Jeremy Strong, Sarah Snook, and Kieran Culkin are all extraordinary.\n\nThe writing, from Jesse Armstrong and his team, is the sharpest on television. The insults alone are worth the subscription. But beneath the satire is genuine grief — for the children these people could have been, for the love this family can't give. The series finale is brutal and perfect.`
  },
  {
    id: 'better-call-saul',
    title: 'Better Call Saul',
    type: 'TV',
    year: '2015–2022',
    platform: 'Netflix / AMC',
    seasons: '6 Seasons',
    officialRating: 'TV-MA',
    criticsScore: 9.2,
    ratings: { story: 9.5, performances: 9.8, craft: 9.8, rewatchability: 9.0 },
    genres: ['Crime', 'Drama', 'Legal Thriller'],
    contentAdvisories: ['Violence', 'Strong Language', 'Drug Use'],
    excerpt: 'A prequel that surpassed its parent show. Jimmy McGill\'s transformation into Saul Goodman is a tragedy worthy of the Greeks.',
    review: `Vince Gilligan and Peter Gould set an impossible task: a Breaking Bad prequel about a supporting character. They delivered something that arguably surpasses its parent show in craft and emotional depth.\n\nBetter Call Saul is a slow-burn tragedy about a good man who can't stop himself from taking shortcuts. Bob Odenkirk's Jimmy McGill is one of television's finest characters — charming, corrupt, genuinely loving, and fundamentally weak. His relationship with Kim Wexler (Rhea Seehorn, criminally underrated for six seasons) is the emotional heart of the show.\n\nThe cinematography by Arthur Albert is film-level gorgeous. The black-and-white flash-forwards are haunting. The finale is devastating in ways that recontextualize the entire run. An extraordinary achievement.`
  },
  {
    id: 'fleabag',
    title: 'Fleabag',
    type: 'TV',
    year: '2016–2019',
    platform: 'Prime Video',
    seasons: '2 Seasons',
    officialRating: 'TV-MA',
    criticsScore: 9.1,
    ratings: { story: 9.5, performances: 9.8, craft: 9.0, rewatchability: 9.5 },
    genres: ['Comedy', 'Drama', 'Romance'],
    contentAdvisories: ['Strong Language', 'Sexual Content', 'Suicide / Self-Harm', 'Mental Health Themes', 'Grief'],
    excerpt: 'Phoebe Waller-Bridge\'s six-hour masterpiece. A comedy about grief that disguises itself as a sex comedy until it isn\'t. The fourth-wall breaks are technically perfect.',
    review: `Phoebe Waller-Bridge wrote, created, and stars in Fleabag — twelve half-hour episodes that are among the finest hours of television ever made.\n\nThe premise sounds light: a messy London woman navigates bad relationships and a struggling café while dealing with her mother's death and a secret she won't admit. The reality is a technically perfect comedy about grief, guilt, and the parts of ourselves we bury in humour.\n\nThe fourth-wall breaks are not a gimmick — they're the show's entire argument. We confide in the audience the things we won't say to the people we love. Season 2 introduces Andrew Scott's Priest and becomes something transcendent: a love story between two people who know it can't work, and love each other enough to admit it. The final look to camera is one of the great moments in television history.`
  },
  {
    id: 'atlanta',
    title: 'Atlanta',
    type: 'TV',
    year: '2016–2022',
    platform: 'FX / Hulu',
    seasons: '4 Seasons',
    officialRating: 'TV-MA',
    criticsScore: 8.9,
    ratings: { story: 9.2, performances: 9.5, craft: 9.0, rewatchability: 8.8 },
    genres: ['Comedy', 'Drama', 'Surrealism'],
    contentAdvisories: ['Violence', 'Strong Language', 'Drug Use', 'Racism / Discrimination', 'Mental Health Themes'],
    excerpt: 'Donald Glover\'s shape-shifting portrait of Black life, the music industry, and American strangeness. Refuses to be categorized and is better for it.',
    review: `Atlanta is unlike anything else on television. Created by and starring Donald Glover, it begins as a music industry comedy and gradually becomes something stranger, funnier, and more unnerving.\n\nGlover's Earn is a Princeton dropout managing his rapper cousin Paper Boi (Brian Tyree Henry, magnificent). Lakeith Stanfield's Darius is the show's id — a philosophical eccentric who exists slightly outside reality. Together they navigate Atlanta's music scene, but the show uses that frame to examine race, poverty, and the surreal texture of American life.\n\nSeason 2 ("Robbin' Season") is the peak: a series of near-horror vignettes that build into a sustained nightmare. Episodes like "Teddy Perkins" and "Barbershop" are standalone masterpieces. Atlanta is genuinely unlike anything else. That's rare.`
  },
  {
    id: 'chernobyl',
    title: 'Chernobyl',
    type: 'TV',
    year: '2019',
    platform: 'Max',
    seasons: 'Miniseries (5 Episodes)',
    officialRating: 'TV-MA',
    criticsScore: 9.4,
    ratings: { story: 9.5, performances: 9.5, craft: 9.5, rewatchability: 8.5 },
    genres: ['Historical Drama', 'Thriller'],
    contentAdvisories: ['Graphic Violence', 'Death of a Child', 'Radiation Effects', 'Animal Cruelty', 'Mental Health Themes'],
    excerpt: 'A five-episode HBO miniseries that functions as both historical record and horror film. What happens when those in power lie about the cost of their lies.',
    review: `Craig Mazin's Chernobyl is the rare historical miniseries that improves on documentary. By dramatizing the 1986 nuclear disaster and its aftermath, it achieves something non-fiction can't: you feel the weight of every decision, every lie, and every death.\n\nJared Harris as physicist Valery Legasov is heartbreaking — a man who understands exactly what happened and must navigate a system built on denial. Emily Watson and Stellan Skarsgård provide the human and political counterweights.\n\nThe show's greatest achievement is its portrayal of Soviet bureaucracy as a machine that punishes truth. The costs of that system — measured in human lives, in contaminated land, in suppressed science — are rendered with unflinching clarity. The final episode's courtroom testimony is among the most moving monologues in television history.`
  },
  {
    id: 'oppenheimer',
    title: 'Oppenheimer',
    type: 'Film',
    year: '2023',
    platform: 'Theaters / Peacock',
    seasons: null,
    officialRating: 'R',
    criticsScore: 9.0,
    ratings: { story: 9.0, performances: 9.5, craft: 9.5, rewatchability: 8.8 },
    genres: ['Historical Drama', 'Biopic', 'Thriller'],
    contentAdvisories: ['Sexual Content', 'Nudity', 'Strong Language', 'War Violence', 'Mental Health Themes'],
    excerpt: 'Christopher Nolan\'s most ambitious film: a three-hour IMAX epic about the man who built the bomb and spent the rest of his life reckoning with it.',
    review: `Christopher Nolan has spent his career building elaborate machines. Oppenheimer is his most elaborate and most human — a three-hour IMAX portrait of J. Robert Oppenheimer, the theoretical physicist who led the Manhattan Project and was later destroyed by the government he served.\n\nCillian Murphy finally gets the film that matches his range. His Oppenheimer is brilliant, seductive, paranoid, and morally compromised in ways he can never fully reckon with. Robert Downey Jr.'s Lewis Strauss provides the film's most treacherous element: a man of pure resentment.\n\nNolan's non-linear structure fractures the film across three timelines, building to a convergence of reckoning that is genuinely harrowing. The Trinity test sequence — without CGI — is one of cinema's great set-pieces. A film that earns its ambition.`
  },
  {
    id: 'everything-everywhere',
    title: 'Everything Everywhere All at Once',
    type: 'Film',
    year: '2022',
    platform: 'Various streaming',
    seasons: null,
    officialRating: 'R',
    criticsScore: 9.3,
    ratings: { story: 9.5, performances: 9.5, craft: 9.0, rewatchability: 9.5 },
    genres: ['Sci-Fi', 'Action', 'Drama', 'Comedy'],
    contentAdvisories: ['Violence', 'Strong Language', 'Mental Health Themes', 'Suicide / Self-Harm'],
    excerpt: 'The Daniels\' multiverse film about a Chinese-American laundromat owner is also the best film about nihilism, kindness, and mother-daughter relationships in years.',
    review: `The Daniels (Daniel Kwan and Daniel Scheinert) made a film about the multiverse that is actually about grief, generational trauma, and the radical act of choosing to care when everything feels meaningless.\n\nMichelle Yeoh is transcendent as Evelyn Wang, a Chinese-American laundromat owner who discovers she must tap into skills from alternate versions of herself to save all of reality. Ke Huy Quan, returning to acting after decades, is a revelation. Jamie Lee Curtis is gonzo fun.\n\nThe film earns its emotional climax through sheer generosity. It builds a thesis — nihilism is the natural response to an overwhelming universe, and love is the irrational, necessary choice — and delivers it with googly eyes, everything bagels, and genuine tears. One of the few films to make me laugh and cry in the same breath for two hours straight.`
  },
  {
    id: 'mad-men',
    title: 'Mad Men',
    type: 'TV',
    year: '2007–2015',
    platform: 'AMC+',
    seasons: '7 Seasons',
    officialRating: 'TV-MA',
    criticsScore: 9.2,
    ratings: { story: 9.5, performances: 9.5, craft: 9.2, rewatchability: 9.0 },
    genres: ['Drama', 'Period', 'Character Study'],
    contentAdvisories: ['Sexual Content', 'Alcohol Use', 'Drug Use', 'Smoking', 'Racism / Discrimination', 'Domestic Violence', 'Strong Language'],
    excerpt: 'Matthew Weiner\'s slow study of identity, advertising, and 1960s America. Jon Hamm\'s Don Draper is one of television\'s great constructed characters.',
    review: `Mad Men is American television's greatest character study. Matthew Weiner set the show in the advertising industry of the 1960s not to be nostalgic but to examine how men — and the culture they dominated — construct and destroy themselves.\n\nJon Hamm's Don Draper is a lie wearing a beautiful suit. A man who invented himself from nothing, who sells other people's fantasies while having none of his own. Elisabeth Moss, January Jones, Christina Hendricks, and Vincent Kartheiser fill the world around him with equal complexity.\n\nThe show's pace is deliberate — it demands patience. But every season builds to emotional revelations that feel earned rather than manufactured. The finale, "Person to Person," is one of television's most ambiguous and perfectly calibrated endings. Is Draper redeemed? Does he sell the best commercial ever made? The show trusts you to decide.`
  },
  {
    id: 'the-sopranos',
    title: 'The Sopranos',
    type: 'TV',
    year: '1999–2007',
    platform: 'Max',
    seasons: '6 Seasons',
    officialRating: 'TV-MA',
    criticsScore: 9.6,
    ratings: { story: 9.8, performances: 9.9, craft: 9.5, rewatchability: 9.5 },
    genres: ['Crime', 'Drama', 'Character Study'],
    contentAdvisories: ['Violence', 'Graphic Violence', 'Strong Language', 'Sexual Content', 'Nudity', 'Drug Use', 'Alcohol Use', 'Domestic Violence'],
    excerpt: 'The show that invented modern prestige television. Tony Soprano is the template from which every subsequent antihero was cast. Still incomparable.',
    review: `The Sopranos invented the blueprint for everything that followed. David Chase's portrait of New Jersey mob boss Tony Soprano — in therapy, managing his crew, struggling with his family — established what prestige drama could be: morally complex, cinematic, and unafraid of ambiguity.\n\nJames Gandolfini's performance is one of the finest in American acting. Tony is violent, funny, perceptive, and pathetic — a man who can identify exactly why he is unhappy but is constitutionally incapable of changing. The therapy sessions with Dr. Melfi (Lorraine Bracco) are some of the sharpest scenes in television history.\n\nThe show's refusal to provide conventional payoff — the infamous cut to black finale — remains the most debated ending in TV history. On rewatch, it's the only possible conclusion for a show about a man who cannot escape himself. Nothing has fully matched it since.`
  },
  {
    id: 'twin-peaks-the-return',
    title: 'Twin Peaks: The Return',
    type: 'TV',
    year: '2017',
    platform: 'Showtime / Paramount+',
    seasons: 'Limited Series (18 Parts)',
    officialRating: 'TV-MA',
    criticsScore: 9.0,
    ratings: { story: 8.8, performances: 9.5, craft: 9.8, rewatchability: 8.0 },
    genres: ['Mystery', 'Horror', 'Surrealism', 'Drama'],
    contentAdvisories: ['Graphic Violence', 'Sexual Content', 'Strong Language', 'Drug Use', 'Flashing Lights', 'Mental Health Themes', 'Death of a Child'],
    excerpt: 'David Lynch\'s 18-hour film that defies genre and occasionally reality. A meditation on nostalgia, grief, and the failure of heroism. Not for the faint-hearted.',
    review: `Twin Peaks: The Return is not television. It is an 18-hour film by David Lynch — a director who operates by his own logic — and it should be approached as such.\n\nKyle MacLachlan plays multiple versions of Dale Cooper across timelines that collapse into each other. The first four parts are deliberately disorienting. Parts 8 and 17-18 are among the most extraordinary things ever produced for any screen.\n\nThe Return is an elegy — for the original series, for the 1990s, for the promise that heroes can fix what's broken. Cooper is trapped, diminished, and ultimately unable to save anyone. The final image is not hope. The show earned the right to that ending through 17 hours of magnificent, maddening commitment to its own vision. Lynch at his most uncompromising.`
  },
  {
    id: 'true-detective-s1',
    title: 'True Detective — Season 1',
    type: 'TV',
    year: '2014',
    platform: 'Max',
    seasons: '1 Season (8 Episodes)',
    officialRating: 'TV-MA',
    criticsScore: 9.3,
    ratings: { story: 9.5, performances: 9.8, craft: 9.8, rewatchability: 9.2 },
    genres: ['Crime', 'Mystery', 'Thriller', 'Horror'],
    contentAdvisories: ['Violence', 'Graphic Violence', 'Sexual Content', 'Nudity', 'Strong Language', 'Drug Use', 'Ritual Abuse', 'Death of a Child'],
    excerpt: 'Nic Pizzolatto\'s eight-episode murder mystery is formally perfect: two performances, one sustained atmosphere of dread, and a closing monologue that earns optimism through nihilism.',
    review: `True Detective's first season is eight episodes of near-perfect crime television. Nic Pizzolatto's script pairs two Louisiana detectives — the philosophically bleak Rustin Cohle and the conventionally pragmatic Marty Hart — across two timelines as they investigate a ritual murder.\n\nMatthew McConaughey and Woody Harrelson are both extraordinary. McConaughey's Rust Cohle is a creation you don't forget — delivering pessimistic monologues that are simultaneously insufferable and genuinely thought-provoking. Harrelson grounds him.\n\nCary Joji Fukunaga's direction is extraordinary — the six-minute single-take housing project raid in episode 4 is a technical marvel. The Louisiana landscape becomes a character: humid, beautiful, corrupt, and old. The finale pulls back from nihilism with a closing monologue that earns every word. This season stands alone; treat it as a standalone film.`
  },
  {
    id: 'moonlight',
    title: 'Moonlight',
    type: 'Film',
    year: '2016',
    platform: 'Various streaming',
    seasons: null,
    officialRating: 'R',
    criticsScore: 9.2,
    ratings: { story: 9.5, performances: 9.8, craft: 9.8, rewatchability: 9.0 },
    genres: ['Drama', 'Coming-of-Age'],
    contentAdvisories: ['Drug Use', 'Violence', 'Strong Language', 'Sexual Content', 'Child Abuse', 'Domestic Violence'],
    excerpt: 'Barry Jenkins\' triptych portrait of a Black gay man in Miami. Intimate, poetic, and devastating. One of the finest films of the century.',
    review: `Moonlight is a film of extraordinary intimacy. Barry Jenkins tells the story of Chiron across three chapters — as a child, a teenager, and a man — tracing the forces that shape and suppress identity.\n\nMahershala Ali's brief appearance as Juan, a drug dealer who becomes Chiron's unlikely mentor, won the Academy Award and deserved it. Naomie Harris is devastating as Chiron's mother, a woman being destroyed by addiction who destroys her son in turn. Trevante Rhodes as adult Chiron carries everything in silence and posture.\n\nJames Laxton's cinematography is luminous — the film looks like memory: too bright, too beautiful, slightly out of reach. Nicholas Britell's score of classical music and hip-hop production is extraordinary. Moonlight won Best Picture and earned every vote. A film that stays.`
  }
];

// Expose to window for browser use
if (typeof window !== 'undefined') {
  window.SHOWS_DATA = shows;
  window.CONTENT_ADVISORIES = CONTENT_ADVISORIES;
  window.TV_RATINGS = TV_RATINGS;
}

// Node.js export for tooling
if (typeof module !== 'undefined') {
  module.exports = { shows, CONTENT_ADVISORIES, TV_RATINGS };
}

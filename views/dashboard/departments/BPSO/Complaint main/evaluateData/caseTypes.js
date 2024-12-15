export const caseTypes = {
    minorInvolved: {
        keywords: [
            'bata', 'binugbog ang aking anak', 'inabuso yung bata',
            'pagpapabaya sa bata', 'child abuse', 'child neglect',
            'juvenile crime', 'kabataan', 'minor'
        ],
        types: ['Juvenile Delinquency', 'Child Endangerment', 'Neglection or Exploitation']
    },
    drugInvolved: {
        keywords: [
            'may bentahan ng droga', 'pinagbantaan ako dahil sa droga', 'droga',
            'gamot na ipinagbabawal', 'illegal drugs', 'drug pushing', 
            'addict', 'drug user', 'substance abuse'
        ],
        types: ['Drug Related Offense', 'Substance Trafficking', 'Rehabilitation Case']
    },
    theftInvolved: {
        keywords: [
            'nakawan', 'ninakawan', 'magnanakaw', 'pagnanakaw',
            'stolen property', 'theft', 'robbery', 'burglary'
        ],
        types: ['Stealing']
    },
    violenceInvolved: {
        keywords: [
            'may suntukan', 'sapakan', 'nagbabanta', 'patayan',
            'may pinatay', 'karahasan', 'violence', 'assault',
            'physical attack', 'murder', 'homicide', 'attempted murder'
        ],
        types: ['Assault', 'Homicide or Attempted Murder', 'Gender-Based Violence']
    },
    domesticIssue: {
        keywords: [
            'abuso', 'karahasan sa tahanan', 'alitan sa pamilya',
            'diskriminasyon', 'domestic abuse', 'family problem',
            'domestic violence', 'verbal abuse', 'emotional abuse'
        ],
        types: ['Domestic Violence', 'Family Feud or Custody Dispute', 'Emotional or Verbal Abuse']
    },
    vandalismInvolved: {
        keywords: [
            'sulat sa pader', 'sira ang ari-arian', 'pagvandal',
            'paninira sa pampublikong lugar', 'graffiti', 'damage to property',
            'public defacement'
        ],
        types: ['Property Defacement', 'Public Infrastructure Damage', 'Graffiti Offense']
    },
    fraudInvolved: {
        keywords: [
            'panloloko', 'pekeng dokumento', 'pekeng kontrata',
            'pandaraya', 'scam', 'fraud', 'forgery',
            'identity theft', 'fake contracts', 'financial fraud'
        ],
        types: ['Forgery', 'Financial Fraud', 'Identity Theft']
    },
    harassmentInvolved: {
        keywords: [
            'pangha-harass', 'pananakot', 'hipo', 'hipoan', 'verbal abuse',
            'pambabastos', 'bastos', 'sexual harassment', 'workplace harassment',
            'bullying'
        ],
        types: ['Bullying', 'Sexual Harassment', 'Workplace Harassment']
    },
    publicDisturbance: {
        keywords: [
            'gulo sa kalsada', 'maingay', 'sigawan', 'away sa pampublikong lugar',
            'videoke', 'ingay', 'public disturbance', 'nuisance', 'unlawful assembly'
        ],
        types: ['Public Nuisance', 'Unlawful Assembly', 'Disorderly Conduct']
    },
    cyberCrimeInvolved: {
        keywords: [
            'hacking', 'pagnanakaw ng impormasyon', 'online scam',
            'sinisirahan sa FB', 'messenger', 'facebook', 'cyber bullying',
            'identity theft', 'phishing'
        ],
        types: ['Hacking', 'Identity Theft', 'Cyber Harassment']
    },
    trespassingInvolved: {
        keywords: [
            'panghihimasok', 'nanghihimasok', 'pagpasok sa hindi pagmay-ari',
            'hindi may ari', 'trespassing', 'pang-aabala', 'unauthorized entry'
        ],
        types: ['Unauthorized Entry', 'Property Trespassing', 'Breaking and Entering']
    },
    illegalParkingInvolved: {
        keywords: [
            "illegal na paradahan", "walang pahintulot", "nakaharang na sasakyan",
            "sagabal sa kalsada", "walang parking", "paradahan sa kalsada",
            "illegally parked vehicle", "road obstruction"
        ],
        types: [
            "Obstruction of Traffic", "Parking Violation", "Illegal Parking in Public Roadway",
            "Disruption of Public Safety", "Unlicensed Parking Activity"
        ]
    },
};

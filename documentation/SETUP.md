## Documentation for Programmers

Basically, for you to be informed I can tell and discuss only a bit on how my file structure looks like
this is applicable only for Vanilla PHP form of project with NodeJS and Composer involved.

## Project Structure
[Click here to redirect to bottom](#heres-thing-to-consider)

```term
FOR (WEB) SUPERSYSTEM
SUPERHERO-SYSTEM/
├ .vscode/
│ ├ extensions.json
├ controllers/
│ ├ departments/
│ ├ ├ Admin1/
│ ├ ├ Admin2/
│ ├ head_admin/
│ ├ super_admin/
├ dist/
│ ├ css/
│ │ index.css
├ documentation/
├ models/
│ ├ departments/
│ ├ ├ Admin1/
│ ├ ├ Admin2/
│ ├ ├ BADAC/
│ ├ ├ BCPC/
│ ├ ├ BPSO/
│ ├ ├ LUPON/
├ views/
│ ├ dashboard/
│ ├ ├ departments/
│ ├ ├ └ Admin1/
│ ├ ├ └ Admin2/
│ ├ ├ └ BADAC/
│ ├ ├ └ BCPC/
│ ├ ├ └ BPSO/
│ ├ ├ └ LUPON/
│ ├ registration/
│ │ └ signup.php
│ ├ templates/
│ │ └ signup.twig
├ .gitignore
├ index.html
├ LICENSE
└ README.md
```

## Here's thing to consider

Kindly please read immediately.

### Priority to See
1. `controllers/` - This should contains your important dynamic features so in terms of functionalities you can organize your own by creating another folder inside affiliated departments where you assigned.

Inside your affiliated department you should only care about how you implement that kind of logic so that in many cases you will never be lost that's all I merely advise.

2. `models/` - This should be only contains many .SQL files as much as possible the only way that I can guarantee for you to follow the things that I've done inside XAMPP / MySQL is to provide my existing .SQL file for you to able to see my progress directly in terms of Tables.

Aside from that once I already provided my working .SQL file is to follow the things that I've done if you implement Cardinality Relationships that's all good.

3. `views/` - This contains more on client-side pages please priority inside affiliated departments where you assigned you may really need to care about your implemented logics in `controllers/` folder.

4. `views/templates` - This should only contains `.twig` files this is templated-engine for making dynamic webpages.

That's all hope this helps!!!

Written by Kenneth O. (@lash0000)
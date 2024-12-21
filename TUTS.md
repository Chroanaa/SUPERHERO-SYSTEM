## To run project (Priority yet partial)

Please ensure that you already had NodeJS installed targeted versions for Redwood projects is v20x.

```powershell
npm install --global yarn
```

```powershell
yarn install
```

```powershell
yarn rw dev
```

# Aftermath of Installation (Ensure that project is working now)

Bago mag-undergo here mismo sa section!!!

## This will create you automatically root page /

```powershell
PS D:\Users\russe\Desktop\KEN\SUPERHERO-SYSTEM> yarn redwood generate page home /
✔ Generating page files...
  ✔ Successfully wrote file `./web\src\pages\HomePage\HomePage.stories.tsx`
  ✔ Successfully wrote file `./web\src\pages\HomePage\HomePage.test.tsx`
  ✔ Successfully wrote file `./web\src\pages\HomePage\HomePage.tsx`
✔ Updating routes file...
✔ Generating types...
✔ One more thing...

Page created! A note about <Metadata>:

At the top of your newly created page is a <Metadata> component,
which contains the title and description for your page, essential
to good SEO. Check out this page for best practices:

https://developers.google.com/search/docs/advanced/appearance/good-titles-snippets
PS D:\Users\russe\Desktop\KEN\SUPERHERO-SYSTEM>
```

## This will create you automaticaly others pages

```powershell
PS D:\Users\russe\Desktop\KEN\SUPERHERO-SYSTEM> yarn redwood generate page index
✔ Generating page files...
  ✔ Successfully wrote file `./web\src\pages\IndexPage\IndexPage.stories.tsx`
  ✔ Successfully wrote file `./web\src\pages\IndexPage\IndexPage.test.tsx`
  ✔ Successfully wrote file `./web\src\pages\IndexPage\IndexPage.tsx`
✔ Updating routes file...
✔ Generating types...
✔ One more thing...

Page created! A note about <Metadata>:

At the top of your newly created page is a <Metadata> component,
which contains the title and description for your page, essential
to good SEO. Check out this page for best practices:

https://developers.google.com/search/docs/advanced/appearance/good-titles-snippets
PS D:\Users\russe\Desktop\KEN\SUPERHERO-SYSTEM>
```
## Problem

Okay, so I have a new structure for the docs in both `hopper` and `dump` and I need to import the previous data into them

## Solution

- Create a new script in `scripts/import-hopper.js` that will read the .txt file with the old data, and populate the new file with that data in the correct format.
- The script should allow you to specify both input and output files.
- The file will import both a `dump.txt` file and a `hopper.txt` file, the format for which are slightly different.

## Preparation

I need you to start by scanning `content\7_submit\hopper-copy\hopper.txt` and `content\7_submit\dump-copy\dump.txt` to understand the correct format, and then scan `content_old\7-submit\3-hopper\hopper.txt` and `content_old\7-submit\2-dump\dump.txt` to understand the old format.

### Hopper

Old format:

```yml
Builder:
  - title: >
      A lot of opinions from a man who made a
      Hamtaro fan game
    docurl: >
      https://docs.google.com/document/d/1EPYk9btJDbYNxLGnSOk5hYJV-ipoCYdPSeSpWvFeYMQ/edit?usp=sharing
    submitter: Positronic
    subdate: 2018-02-25
    recorded: "0"
    _fieldset: submitteddoc
    gd_flag: "0"
    dibs: Zarla,Portaxx
```

New format:

```yml
Docs:
  - title: "Test Document 2"
    docurl: "https://docs.google.com/document/d/15ZkeIPRBUBGhz2bIBOzUDBqbpiQLelYWXulJnnE9lIA/edit?usp=sharing"
    submitter: "person1, person2"
    subdate: "2025-05-21"
    gd_flag: "true"
    dibs: "you, me, a third person as well"
    recorded: "true"
```

So you'll notice some slight differences: Using "true"/"false" instead of "1"/"0", fields are on a single line instead of using that `>` syntax. We've gotten rid of that \_fieldset field. We've wrapped everything in '', and most crucially, we're using the field of "Docs" instead of "Builder".

**KEEP IN MIND** You might not see fields of `gd_flag` or `dibs` in some cases in the old file. If you don't see the fields, treat it as though the boolean fields are "0", and the dibs field is an empty string.

### Dump

Old format:

```yml
Builder:
  - title: Wikipedia Talk Pages
    docurl: >
      https://docs.google.com/document/d/1DsSG8suxVAGsk9Ym3UsIxfTl1mZKcocdCiZbvz1zQ6E/edit?usp=sharing
    submitter: Julia
    rejectdate: 2014-07-10
    _fieldset: submitteddoc
```

Docs:

```yml
Docs:
  - title: "Rejected Document #1"
    docurl: "https://docs.google.com/document/d/1g-6gMKc6F6x916OPlHqn2zw9MLAXOlcFoNuxE0rQ1mc/edit?usp=sharing"
    submitter: "chai tea latte"
    rejectdate: "2025-09-23"
```

Pretty much the same deal, except for there's fewer fields.

## Acceptance Criteria

- [x] A new file exists at `scripts/import-hopper.js` that can be run with `node scripts/import-hopper.js`
- [x] In a place at the top of the file, you can specify the input and output files for both hopper and dump
- [x] When you run the script, it reads the old files, transforms the data into the new format, and writes it to the new files
- [x] If a `Docs` section exists in the output file, it will be replaced with the new data. If it doesn't exist, it will be created.

## Notes

- Currently configured to write to the `-copy` files for testing. Change `HOPPER_OUTPUT` / `DUMP_OUTPUT` at the top of the script to target the real files.
- Dates are normalised to `YYYY-MM-DD` via UTC (js-yaml auto-parses YAML date scalars into `Date` objects).
- Boolean fields (`recorded`, `gd_flag`) are converted from `"0"`/`"1"` → `'false'`/`'true'`; missing fields default to `'false'`.
- Single quotes inside values are escaped by doubling them (YAML convention).
- Imported 126 hopper entries and 141 dump entries from `content_old`.

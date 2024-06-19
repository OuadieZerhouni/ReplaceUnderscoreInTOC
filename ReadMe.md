
# ReplaceUnderscoreInTOC

A **MediaWiki** extension to replace underscores with hyphens in Table of Contents links.

## Description

This extension modifies the Table of Contents (ToC) links and `mw-headline` element IDs in MediaWiki, replacing underscores (`_`) with hyphens (`-`). This helps to create cleaner and more readable URLs and IDs.

## Installation

1. **Download the Extension**

   Clone the repository or download the files from GitHub and place them in the `extensions/ReplaceUnderscoreInTOC` directory of your MediaWiki installation.

   ```bash
   cd extensions
   git clone https://github.com/OuadieZerhouni/ReplaceUnderscoreInTOC.git
   ```

2. **Enable the Extension**

   Add the following line to your `LocalSettings.php` file:

   ```php
   wfLoadExtension( 'ReplaceUnderscoreInTOC' );
   ```

## Files

- `ReplaceUnderscoreInTOC.php`: The main PHP file for the extension.
- `extension.json`: The extension registration file.

## Usage

Once installed and enabled, the extension will automatically modify the ToC links and `mw-headline` IDs on page load.

## Development

Feel free to contribute to the development of this extension. Pull requests are welcome.

## Author

- Ouadie ZERHOUNI - [OuadieZerhouni](https://github.com/OuadieZerhouni)

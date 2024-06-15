window.onload = function() {
    console.log("ReplaceUnderscoreInTOC script loaded.");

    // Select all anchor tags in the ToC
    var tocLinks = document.querySelectorAll('#toc a[href*="_"]');
    
    console.log("Found " + tocLinks.length + " ToC links.");
    
    // Iterate through each link and replace '_' with '-'
    tocLinks.forEach(function(link) {
        console.log("Original href: " + link.href);
        if (link.href.includes('#')) {
            var parts = link.href.split('#');
            parts[1] = parts[1].replace(/_/g, '-');
            link.href = '#' + parts[1];
            console.log("Updated href: " + link.href);
        }
    });

    // Now replace in the id of every mw-headline
    var mwHeadlines = document.querySelectorAll('.mw-headline');
    console.log("Found " + mwHeadlines.length + " mw-headlines.");
    mwHeadlines.forEach(function(headline) {
        console.log("Original id: " + headline.id);
        headline.id = headline.id.replace(/_/g, '-');
        console.log("Updated id: " + headline.id);
    });
};

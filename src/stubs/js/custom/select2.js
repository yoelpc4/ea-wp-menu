let modelMatcher = (params, data) => {
    data.parentText = data.parentText || "";

    // Always return the object if there is nothing to compare
    if ($.trim(params.term) === '') {
        return data;
    }

    // Do a recursive check for options with children
    if (data.children && data.children.length > 0) {
        // Clone the data object if there are children
        // This is required as we modify the object to remove any non-matches
        let match = $.extend(true, {}, data);

        // Check each child of the option
        for (let c = data.children.length - 1; c >= 0; c--) {
            let child = data.children[c];
            child.parentText += data.parentText + " " + data.text;

            let matches = modelMatcher(params, child);

            // If there wasn't a match, remove the object in the array
            if (matches == null) {
                match.children.splice(c, 1);
            }
        }

        // If any children matched, return the new object
        if (match.children.length > 0) {
            return match;
        }

        // If there were no matching children, check just the plain object
        return modelMatcher(params, match);
    }

    // If the typed-in term matches the text of this term, or the text from any
    // parent term, then it's a match.
    let original = (data.parentText + ' ' + data.text).toUpperCase();
    let term = params.term.toUpperCase();


    // Check if the text contains the term
    if (original.indexOf(term) > -1) {
        return data;
    }

    // If it doesn't contain the term, don't return anything
    return null;
};

module.exports = {
    modelMatcher
};

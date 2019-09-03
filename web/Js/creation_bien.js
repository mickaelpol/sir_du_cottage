var $collectionHolder;

// setup an "add a tag" link
var $addTagButton = $('<button type="button" class="add_tag_link">Ajouter un coloris</button>');
var $newLinkLi = $('<li></li>').append($addTagButton);

$(document).ready(function() {

    function addTagFormDeleteLink($tagFormLi) {
        var $removeFormButton = $('<button type="button">X</button>');
        $tagFormLi.append($removeFormButton);

        $removeFormButton.on('click', function(e) {
            // remove the li for the tag form
            $tagFormLi.remove();
        });
    }

    // Get the ul that holds the collection of tags
    $collectionHolder = $('ul.coloris')
    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);
    // add a delete link to all of the existing tag form li elements

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $('.add_tag_link').on('click', function(e) {
        let collection = $(this).parent().parent();
        var prototype = collection.data('prototype');
        var index = collection.data('index');
        var newForm = prototype;
        newForm = newForm.replace(/__name__/g, index);
        collection.data('index', index + 1);
        var $newFormLi = $('<li></li>').append(newForm);
        $(this).before($newFormLi);
        addTagFormDeleteLink($newFormLi);
    });

    var $wrapper = $('.js-delete-row');
    $wrapper.on('click', '.js-remove-coloris-parquet', function(e) {
        e.preventDefault();
        $(this).closest('.js-coloris-parquet-item')
            .remove();
    });

});
var $collectionHolder;
var $collectionHolderCom;

// setup an "add a tag" link
var $addTagButton = $('<button type="button" class="add_tag_link">Ajouter un coloris</button>');
var $newLinkLi = $('<li></li>').append($addTagButton);

// setup an "add a commentaire" link
var $addTagButtonCom = $('<button type="button" class="add_com_link">Ajouter un commentaire</button>');
var $newLinkLiCom = $('<li></li>').append($addTagButtonCom);


$(document).ready(function() {

    function addTagFormDeleteLink($tagFormLi) {
        var $removeFormButton = $('<button type="button">X</button>');
        $tagFormLi.append($removeFormButton);

        $removeFormButton.on('click', function(e) {
            // remove the li for the tag form
            $tagFormLi.remove();
        });
    }

    function addTagForm($collectionHolder, $newLinkLi) {
        // Get the data-prototype explained earlier
        var prototype = $collectionHolder.data('prototype');
        // get the new index
        var index = $collectionHolder.data('index');
        var newForm = prototype;
        newForm = newForm.replace(/__name__/g, index);
        // increase the index with one for the next item
        $collectionHolder.data('index', index + 1);
        // Display the form in the page in an li, before the "Add a tag" link li
        var $newFormLi = $('<li></li>').append(newForm);
        $newLinkLi.before($newFormLi);
        addTagFormDeleteLink($newFormLi);
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

    let $wrapper = $('.js-delete-row');
    $wrapper.on('click', '.js-remove-coloris-parquet', function(e) {
        e.preventDefault();
        $(this).closest('.js-coloris-parquet-item').remove();
    });




    /* Partie ajout de commentaire */
    // Get the ul that holds the collection of tags
    $collectionHolderCom = $('ul.commentaires');

    // $collectionHolderCom.find('li').each(function() {
    //     addTagFormDeleteLink($(this));
    // });

    // add the "add a commentaires" anchor and li to the tags ul
    $collectionHolderCom.append($newLinkLiCom);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolderCom.data('index', $collectionHolderCom.find(':input').length);

    $addTagButtonCom.on('click', function(e) {
        addTagForm($collectionHolderCom, $newLinkLiCom);
    });

    var $wrapper2 = $('.js-genus-scientist-wrapper');
    $wrapper2.on('click', '.js-remove-scientist', function(e) {
        e.preventDefault();
        $(this).closest('.js-genus-scientist-item')
            .remove();
    });

});
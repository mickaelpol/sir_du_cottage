var $collectionHolder;
var $collectionHolder2;

// setup an "add a tag" link
var $addTagButton = $('<button type="button" class="btn btn-primary bmd-btn-fab"><i class="material-icons">add</i></button>');
var $newLinkLi = $('<li></li>').append($addTagButton);
var $addTagButton2 = $('<button type="button" class="btn btn-primary bmd-btn-fab"><i class="material-icons">add</i></button>');
var $newLinkLi2 = $('<li></li>').append($addTagButton2);

function addTagForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    var newForm = prototype;
    // You need this only if you didn't set 'label' => false in your tags field in TaskType
    // Replace '__name__label__' in the prototype's HTML to
    // instead be a number based on how many items we have
    // newForm = newForm.replace(/__name__label__/g, index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
}

function addTagForm2($collectionHolder2, $newLinkLi2) {
    // Get the data-prototype explained earlier
    var prototype2 = $collectionHolder2.data('prototype');

    // get the new index
    var index2 = $collectionHolder2.data('index');

    var newForm2 = prototype2;
    // You need this only if you didn't set 'label' => false in your tags field in TaskType
    // Replace '__name__label__' in the prototype's HTML to
    // instead be a number based on how many items we have
    // newForm = newForm.replace(/__name__label__/g, index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm2 = newForm2.replace(/__name__/g, index2);

    // increase the index with one for the next item
    $collectionHolder2.data('index', index2 + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi2 = $('<li></li>').append(newForm2);
    $newLinkLi2.before($newFormLi2);
}

$(document).ready(function() {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('ul.tags');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addTagButton.on('click', function(e) {
        // add a new tag form (see next code block)
        addTagForm($collectionHolder, $newLinkLi);
    });


    $collectionHolder2 = $('ul.suppTerrasse');
    $collectionHolder2.append($newLinkLi2);
    $collectionHolder2.data('index', $collectionHolder2.find(':input').length);

    $addTagButton2.on('click', function(e) {
        // add a new tag form (see next code block)
        addTagForm2($collectionHolder2, $newLinkLi2);
    });

    const formTerrasse = $('#terrasse');
    const terrasseRadio = $('input[type="radio"][name="appbundle_chantier[messageTerrasse]"]');
    const formParquet = $('#parquet');
    const parquetRadio = $('input[type="radio"][name="appbundle_chantier[messageParquet]"]');

    formTerrasse.hide();
    formParquet.hide();

    terrasseRadio.click(function() {
        let statutTerrasse = terrasseRadio[0].checked;
        if (statutTerrasse === true) {
            formTerrasse.show();
        } else {
            formTerrasse.hide();
        }
    });

    parquetRadio.click(function() {
        let statutParquet = parquetRadio[0].checked;
        if (statutParquet === true) {
            formParquet.show();
        } else {
            formParquet.hide();
        }
    });


});
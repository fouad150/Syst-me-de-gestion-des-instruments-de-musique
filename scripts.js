var form=document.forms['form-instrument'];

function showModal(parent){
    let instrument_id=parent.getAttribute("id");
    let image_destination=parent.children[0].children[0].getAttribute("id");
    let name_text=parent.children[1].textContent;
    let category_id=parent.children[2].getAttribute("id");
    let quantity=parent.children[3].textContent;
    let price=parent.children[4].textContent;

    form.instrument_id.value=instrument_id;
    form.image_destination.value=image_destination;
    form.name.value=name_text;
    form.category_id.value=category_id;
    form.quantity.value=quantity;
    form.price.value=price;
    console.log(form.name.value);

    hideSave();
}

function emtyModal(){
    form.reset();
    hideUpdateAndDelete();
}

function hideSave(){
    document.getElementById("instrument-save-btn").style.display="none";
    document.getElementById("instrument-update-btn").style.display="block";
    document.getElementById("instrument-delete-btn").style.display="block";
}

function hideUpdateAndDelete(){
    document.getElementById("instrument-delete-btn").style.display="none";
    document.getElementById("instrument-update-btn").style.display="none";
    document.getElementById("instrument-save-btn").style.display="block";
}
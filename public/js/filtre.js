
// let template = ` <div class="row croisiere mb-3" style="background-color: gainsboro !important;">
// <div class="col-md-4 mt-5 mb-5">
//     <img src="${img}" style="width:100%; height:150px ;aspect-ratio: 1 ;object-fit:cover">
// </div>
// <div class=" col-md-5 p-3">
//     <p class="nuit">${nbr_nuit}Nuits</p>
//     <h4 class="title_vg">${title}</h4>
//     <p><img width="30px" height="30px" src="<?= URLROOT . "/uploads/" . $key->image ?>" alt="cruise"> <?= $key->nom  ?></p>
//     <p><span class="depart_dep">Port de départ :</span> ${portdep}</p>
// </div>
// <div class="col-md-3 text-center p-3" id="prix_div">

//     <p class="prix">${prix} <span class="mad">MAD</span></p>
//     <p class="mad">solo</p>
//     <a href="http://localhost/ShipCruiseTour/client/getBooking/ ${id_croisiere}" value="<?= $key->id_croisiere ?>" class="btn btn-outline-primary mb-3">Réserver</a>
//     <p class="depart_dep">${date_depart}
//     <p>
// </div>
// </div>
// <?php } ?>`

$('#port').on('change', function () {
    console.log($('#port').val())
    $.ajax({
        url: 'http://localhost/ShipCruiseTour/client/filterCr/' + $('#port').val() + '',
        type: 'POST',
        contentType: false,
        cache: false,
        success: function (res) {
            let data = JSON.parse(res);
            console.log(data)
            $('#heho').empty()
            data.croisieres.forEach(element => {
                $('#heho').append(` <div class="row croisiere mb-3" style="background-color: gainsboro !important;">
                <div class="col-md-4 mt-5 mb-5">
                    <img src="http://localhost/ShipCruiseTour/uploads/${element.image}" style="width:100%; height:150px ;aspect-ratio: 1 ;object-fit:cover">
                </div>
                <div class=" col-md-5 p-3">
                    <p class="nuit">${element.nbr_nuit}Nuits</p>
                    <h4 class="title_vg">${element.title}</h4>
                    <p><img width="30px" height="30px" src="<?= URLROOT . "/uploads/" . $key->image ?>" alt="cruise"> <?= $key->nom  ?></p>
                    <p><span class="depart_dep">Port de départ :</span> ${element.portdep}</p>
                </div>
                <div class="col-md-3 text-center p-3" id="prix_div">
                
                    <p class="prix">${element.prix} <span class="mad">MAD</span></p>
                    <p class="mad">solo</p>
                    <a href="http://localhost/ShipCruiseTour/client/getBooking/ ${element.id_croisiere}" value="" class="btn btn-outline-primary mb-3">Réserver</a>
                    <p class="depart_dep">${element.date_depart}
                    <p>
                </div>
                </div>`)

            });
        }
    })


})


$('#navire').on('change', function () {
    console.log($('#navire').val())
    if ($('#navire').val()=="") {
        console.log(heho)
        location.reload ()
    }else{

        $.ajax({
            url: 'http://localhost/ShipCruiseTour/client/filterNavire/' + $('#navire').val() + '',
            type: 'POST',
            contentType: false,
            cache: false,
            success: function (res) {
                let data = JSON.parse(res);
                console.log(data)
                $('#heho').empty()
                data.croisieres.forEach(element => {
                    $('#heho').append(` <div class="row croisiere mb-3" style="background-color: gainsboro !important;">
                    <div class="col-md-4 mt-5 mb-5">
                        <img src="http://localhost/ShipCruiseTour/uploads/${element.image}" style="width:100%; height:150px ;aspect-ratio: 1 ;object-fit:cover">
                    </div>
                    <div class=" col-md-5 p-3">
                        <p class="nuit">${element.nbr_nuit}Nuits</p>
                        <h4 class="title_vg">${element.title}</h4>
                        <p><img width="30px" height="30px" src="<?= URLROOT . "/uploads/" . $key->image ?>" alt="cruise"> <?= $key->nom  ?></p>
                        <p><span class="depart_dep">Port de départ :</span> ${element.portdep}</p>
                    </div>
                    <div class="col-md-3 text-center p-3" id="prix_div">
                    
                        <p class="prix">${element.prix} <span class="mad">MAD</span></p>
                        <p class="mad">solo</p>
                        <a href="http://localhost/ShipCruiseTour/client/getBooking/ ${element.id_croisiere}" value="" class="btn btn-outline-primary mb-3">Réserver</a>
                        <p class="depart_dep">${element.date_depart}
                        <p>
                    </div>
                    </div>`)
    
                });
            }
        })
    }


})



$('#date').on('change', function () {
    console.log($('#date').val())
    if ($('#date').val()=="") {
        console.log(heho)
        location.reload ()
    }else{

        $.ajax({
            url: 'http://localhost/ShipCruiseTour/client/filterDate/' + $('#date').val() + '',
            type: 'POST',
            contentType: false,
            cache: false,
            success: function (res) {
                let data = JSON.parse(res);
                console.log(data)
                $('#heho').empty()
                data.croisieres.forEach(element => {
                    $('#heho').append(` <div class="row croisiere mb-3" style="background-color: gainsboro !important;">
                    <div class="col-md-4 mt-5 mb-5">
                        <img src="http://localhost/ShipCruiseTour/uploads/${element.image}" style="width:100%; height:150px ;aspect-ratio: 1 ;object-fit:cover">
                    </div>
                    <div class=" col-md-5 p-3">
                        <p class="nuit">${element.nbr_nuit}Nuits</p>
                        <h4 class="title_vg">${element.title}</h4>
                        <p><img width="30px" height="30px" src="<?= URLROOT . "/uploads/" . $key->image ?>" alt="cruise"> <?= $key->nom  ?></p>
                        <p><span class="depart_dep">Port de départ :</span> ${element.portdep}</p>
                    </div>
                    <div class="col-md-3 text-center p-3" id="prix_div">
                    
                        <p class="prix">${element.prix} <span class="mad">MAD</span></p>
                        <p class="mad">solo</p>
                        <a href="http://localhost/ShipCruiseTour/client/getBooking/ ${element.id_croisiere}" value="" class="btn btn-outline-primary mb-3">Réserver</a>
                        <p class="depart_dep">${element.date_depart}
                        <p>
                    </div>
                    </div>`)
    
                });
            }
        })
    }


})
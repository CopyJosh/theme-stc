//action when autocomplete clicked
UIkit.ready(function() {

    UIkit.$('#autocomplete').on('selectitem.uk.autocomplete', function (e, data, ac) {

        //UIkit.$('#clickResult').text('You clicked ' + data.value + ' and I erased that again!').addClass('uk-alert');
        ac.input.val('');

        var jqxhr = $.getJSON( "http://pagekit.app/packages/standardtextile/theme-stc/assets/testfile.php?request=true", function() {
            console.log( "success" );
        })
            .done(function(data) {
                console.log( "second success" );

                var form = document.getElementById('user-edit');
                form.__vue__.$root.user = data.user;

                var profile = form.__vue__.$root.$children[1].profilevalues;
                profile.account.value = data.profilevalues.account;
                document.getElementById('formmakerfield_1').value = data.profilevalues.account;
                profile.address.value = data.profilevalues.address;
                document.getElementById('formmakerfield_2').value = data.profilevalues.address;
                profile.city.value = data.profilevalues.city;
                document.getElementById('formmakerfield_3').value = data.profilevalues.city;
                profile.state.value = data.profilevalues.state;
                document.getElementById('formmakerfield_4').value = data.profilevalues.state;
                profile.zip.value = data.profilevalues.zip;
                document.getElementById('formmakerfield_5').value = data.profilevalues.zip;
                profile['contact-one'].value = data.profilevalues['contact-one'];
                document.getElementById('formmakerfield_6').value = data.profilevalues['contact-one'];
                profile['contact-one-title'].value = data.profilevalues['contact-one-title'];
                document.getElementById('formmakerfield_7').value = data.profilevalues['contact-one-title'];
                profile['contact-two'].value = data.profilevalues['contact-two'];
                document.getElementById('formmakerfield_8').value = data.profilevalues['contact-two'];
                profile.rep.value = data.profilevalues.rep;
                document.getElementById('formmakerfield_9').value = data.profilevalues.rep;
                profile.notified.value = data.profilevalues.notified;
                document.getElementById('formmakerfield_10').value = data.profilevalues.notified;
                profile.email.value = data.profilevalues.email;
                document.getElementById('formmakerfield_12').value = data.profilevalues.email;
                profile['email-type'].value = data.profilevalues['email-type'];
                document.getElementById('formmakerfield_13').value = data.profilevalues['email-type'];
                profile.contract.value = data.profilevalues.contract;
                document.getElementById('formmakerfield_14').value = data.profilevalues.contract;
                profile.phone.value = data.profilevalues.phone;
                document.getElementById('formmakerfield_15').value = data.profilevalues.phone;
                profile.handheld.value = data.profilevalues.handheld;
                document.getElementById('formmakerfield_16').value = data.profilevalues.handheld;
                profile['ctx-id'].value = data.profilevalues['ctx-id'];
                document.getElementById('formmakerfield_17').value = data.profilevalues['ctx-id'];
                profile.region.value = data.profilevalues.region;
                document.getElementById('formmakerfield_18').value = data.profilevalues.region;
                profile.controltex.value = data.profilevalues.controltex;
                document.getElementById('formmakerfield_19').value = data.profilevalues.controltex;

                console.log(form.__vue__.$root);
                console.log(data);
            })
            .fail(function() {
                console.log( "error" );
            })
            .always(function() {
                console.log( "complete" );
        });



        data = null;


    });

    /*
    function getAutocompleteData (release) {
        var search = this.value, items = []; //the scope is autocomplete, value in input is stored there as this.value
        //do some stuff with your data. this is the default search of UIkit autocomplete
        data.forEach(function(item){
            if(item.value && item.value.toLowerCase().indexOf(search.toLowerCase())!=-1) {
                items.push(item);
            }
        });
        //release the data to the renderer
        release(items);
    }

    UIkit.on('domready.uk.dom', function(){
        UI.autocomplete($('#autocomplete'), {
            source: getAutocompleteData, //pass in the array of unfiltered items or a function call returning an array of (unfiltered) items
            renderer: function (data) { //optional: hide ac when no items
                if (data) {
                    if (data.length) {
                        this.dropdown.append(this.template({"items": data}));
                        this.show();
                        this.trigger('show.uk.autocomplete', [data, this]);
                    } else {
                        this.hide();
                    }
                }
            }
        });
    });
    */
});


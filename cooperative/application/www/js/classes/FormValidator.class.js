/*

 111222aaa
 aaallll
 "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,10}"
 */

"use strict";

class FormValidator {

    constructor($form) {
        this.$form = $form;
        this.$errorMessage = this.$form.find('.error-message');
    }

    checkRequired() {

        // on récupère les champs qui possèdent l'attribut data "required"
        $('[data-required]').each(function (i, item) {
                // on est obligé d'uiliser item car le bind change la valeur de this
                let value = item.value;

                if (value.length === 0) {
                    this.errors.push('le champ <em>' + item.dataset.name + '</em> est requis');
                }
                // on place un bind ici car la "function" change le contexte
                // or nous voulons l'instance de FormValidator pour ajouter le message d'erreur
            }.bind(this)
        );

    }

    checkLength() {

        $('[data-maxlength]').each(function (i, item) {
                let value = item.value;
                let maxLength = item.dataset.maxlength;

                if (value.length > maxLength) {
                    this.errors.push('<em>' + item.dataset.name + '</em> est trop long (max ' + maxLength + ' caractères)');
                }
            }.bind(this)
        );


        $('[data-minlength]').each(function (i, item) {
                let value = item.value;
                let minLength = item.dataset.minlength;
            if (value.length > 0 && value.length < minLength) {
                    this.errors.push('<em>' + item.dataset.name + '</em> est trop court (min ' + minLength + ' caractère)');
                }
            }.bind(this)
        );

    }

    checkType() {
        $('[data-type]').each(function (i, item) {
                let value = item.value;
                let type = item.dataset.type;
            let regex;

                // positiveInteger, password, email
                switch (type) {
                    case 'string' :
                        regex = /^[a-z\-\s]*$/i;
                        if (value.length > 0 && !value.match(regex)) {
                            this.errors.push('<em>' + item.dataset.name + '</em> ne doit contenir que des lettres.');
                        }
                        break;

                    case 'positiveInteger':
                        if (value.length > 0 && !isNumber(value) || !isInteger(value) || value < 0) {
                            this.errors.push('<em>' + item.dataset.name + '</em> doit être un entier positif');
                        }
                        break;

                    case 'password':
                        regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\-.$@!%*?&\s#])[\w\s\-.$@!%*?&#]{6,}/;
                        if (value.length > 0 && !value.match(regex)) {
                            this.errors.push('<em>' + item.dataset.name + '</em> doit contenir au moins un lettre majuscule, minuscule, chiffre et caractère spécial.');
                        }
                        break;

                    case 'email':
                        regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                        if (value.length > 0 && !value.match(regex)) {
                            this.errors.push('<em>' + item.dataset.name + '</em> doit être un mail valide.');
                        }
                        break;
                }
            }.bind(this)
        );
    }

    onSubmitForm(event) {
        // j'annule l'envoi du formulaire

        // on vide les erreurs
        this.errors = [];

        // vérifie les champs
        this.checkRequired();
        this.checkLength();
        this.checkType();

        // s'il y a des erreurs on bloque l'envoi et on les affiche
        if (this.errors.length > 0) {
            event.preventDefault();
            this.displayErrors();
        }
    }

    displayErrors() {
        let ul = $('<ul>');

        // on crée la liste d'erreurs dans la mémoire
        $(this.errors).each(function () {
            ul.append($('<li>').html(this));
        });

        // et seulement à cet endroit on injecte le <ul> dans le DOM.
        // il est important de limiter le nombre de append() et de html()
        // dans le DOM qui sont très gourmands en ressources
        this.$errorMessage.empty().append(ul).slideDown();

    }

    start() {
        // on attend la soumission du formulaire
        this.$form.submit(this.onSubmitForm.bind(this));
    }
}

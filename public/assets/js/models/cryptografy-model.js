/**
 * Clase para el tratamiento de cadenas de caracteres
 */

class Crypto 
{
    #text;

    constructor(text = '') 
    {
        this.#text = text;
    }

    setText(text)
    {
        this.#text = text;
    }

    getText()
    {
        return this.#text;
    }

    // Método para determinar anagramas
    anagram(t1, t2) 
    {
        let sw1 = false;
        let i, j;
        i = 0;
        if (t1.length == t2.length) {
            t1 = t1.toLowerCase();
            t2 = t2.toLowerCase();
            while (i < t1.length && !sw1) {
                let sw2 = false;
                j = 0;
                while (j < t2.length && !sw2){
                    if (t1.charAt(i) == t2.charAt(j)) {
                        sw2 = true;
                    } else {
                        j++;
                    }
                }
                if (sw2) {
                    i++;
                } else {
                    sw1 = true;
                }
            }
        } else {
            sw1 = true;
        }
        return sw1;
    }


    // Métodos para determinar palíndromos
    palindrome()
    {
        let phrase = this.text;
        phrase = phrase.toLowerCase();
        phrase = this.deleteSpaces(phrase);
        if (this.compareCharacters(phrase)) {
            return true;
        } else {
            return false;
        }
    }

    deleteSpaces(phrase)
    {
        phrase = phrase.trim();
        let i = 0;
        while (i < phrase.length) {
            if (phrase.substring(i, i + 1) == " ") {
                phrase = phrase.substring(0, i) + 
                    phrase.substring(i + 1, phrase.length);
            } else {
                i++; 
            }
        }
        return phrase;
    }

    compareCharacters(phrase)
    {
        let sw = true; // Supuesto: frase es palíndromo
        let i = 0;
        while (i <= phrase.length / 2 && sw) {
            if (phrase.substring(i, i + 1) == phrase.substring(phrase.length - i - 1, phrase.length - i )) {
                i++;
            } else {
                sw = false;
            }
        }
        return sw;
    }
}

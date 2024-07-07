/**
 * Clase para el tratamiento de Arrays
 */


class Arrays 
{
    constructor() 
    {
      
    }


    findElement(array, element, property = '')
    {
        let i = 0;
        let pos = -1;
        let elemArray;
        while (i < array.length && pos == -1) {
            elemArray = property === '' ? array[i] : array[i][property];
            if (elemArray === element) {
                pos = i;
            } else {
                i++;
            }
        }
        return pos;
    }


    removeElement(array, position)
    {
        for (let i = position; i < array.length - 1; i++) {
            array[i] = array[i + 1];
        }
        array.pop();
    }


    stack(array, datum) 
    {
        if (array.length < 1000) {
            return array.push(datum);
        } else {
            return 'desbordamiento';
        }
    }


    unStack(array)
    {
        if (array.length > 0) {
            return array.pop();
        } else {
            return 'subdesbordamiento';
        }
    }
}

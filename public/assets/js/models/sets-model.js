class Sets 
{
    constructor() 
    {
        this.arrayA = [];
        this.arrayB = [];
        this.arrayU = [];
    }


    showSet(nameSet, arraySet)
    {
        let stringSet = `${nameSet} = {`;
        arraySet.forEach ((element) => {
            stringSet += `${element}, `;
        });
        if (arraySet.length > 0) {
            stringSet = stringSet.substring(0, stringSet.length -2) + '}'; 
        } else {
            stringSet += '}'; 
        }
        return stringSet;
    }


    union(arrayA, arrayB)
    {
        let arrayResult = arrayA.slice();
        arrayB.forEach ((element) => {
            if (objArray.findElement(arrayA, element) === -1) {
                arrayResult[arrayResult.length] = element;
            }
        });
        return arrayResult;
    }


    intersection(arrayA, arrayB)
    {
        let arrayResult = [];
        arrayA.forEach ((element) => {
            if (objArray.findElement(arrayB, element) > -1) {
                arrayResult[arrayResult.length] = element;
            }
        });
        return arrayResult;
    }


    minus(arrayA, arrayB)
    {
        let arrayResult = [];
        arrayA.forEach ((element) => {
            if (objArray.findElement(arrayB, element) === -1) {
                arrayResult[arrayResult.length] = element;
            }
        });
        return arrayResult;
    }


    cartesianProduct(arrayA, arrayB)
    {
        let i = 0;
        let arrayResult = [];
        arrayA.forEach ((elementA) => {
            arrayB.forEach ((elementB) => {
                arrayResult[i] = `(${elementA}, ${elementB})`;
                i++;
            });
        });
        return arrayResult;
    }


    powerSet(arrayA, arrayB)
    {
        let arrayResult = [];
        return arrayResult;
    }
}
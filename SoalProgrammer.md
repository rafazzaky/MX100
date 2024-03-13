No. 1
```
function cetakPiramid(n){
  let a = 0
  for(let i = 1; i <= n; i++){
    let baris = ""
    for(let j = i; j<n; j++){
      baris += " "
    }
    for(let j = 1; j<=i; j++){
      a++
      baris += (a%10).toString()
    }
    a--
    for(let j = 1; j < i; j++){
      baris += (a%10).toString()
      a--
    }
    console.log(baris)
    a++
  }
}
```
No. 2
```
function tampilkanBilangan() {
    for (let bilangan = 0; bilangan <= 20; bilangan++) {
        if (bilangan % 2 === 0) {
            console.log(bilangan + " adalah bilangan genap");
        } else {
            console.log(bilangan + " adalah bilangan ganjil");
        }
    }
}
```

No. 3
```
function isPrime(number) {
    if (number <= 1) {
        return false;
    }
    for (let i = 2; i <= Math.sqrt(number); i++) {
        if (number % i === 0) {
            return false;
        }
    }
    return true;
}

function tampilkanBilanganPrima(n_awal, n_akhir) {
    for (let number = n_awal; number <= n_akhir; number++) {
        if (isPrime(number)) {
            console.log(number);
        }
    }
}
```

No. 4 
```
function tampilkanHuruf(huruf, kolom, baris) {
    for (let i = 0; i < baris; i++) {
        let barisOutput = "";
        
        for (let j = 0; j < kolom; j++) {
            barisOutput += huruf;
        }
        
        console.log(barisOutput);
    }
}
```

No. 5
```
function cariBilanganTerbesarTerkecil(data) {
  let terbesar = data[0];
  let terkecil = data[0];

  for (let i = 1; i < data.length; i++) {
    if (data[i] > terbesar) {
      terbesar = data[i];
    }
    if (data[i] < terkecil) {
      terkecil = data[i];
    }
  }

  console.log('Bilangan terbesar:', terbesar);
  console.log('Bilangan terkecil:', terkecil);
}
```

No. 6
```
function balikKata(kata) {
    let kataTerbalik = '';

    for (let i = kata.length - 1; i >= 0; i--) {
        kataTerbalik += kata[i];
    }

    console.log(kataTerbalik);
}
```

No. 7
```
function factorial(n) {
    if (n === 0) {
        return 1;
    } else {
        return n * factorial(n - 1);
    }
}
```

No. 8
```
function bilanganHabisDibagi(bilangan, awal, akhir) {
    for (let i = awal; i <= akhir; i++) {
        if (i % bilangan === 0) {
            console.log(i);
        }
    }
}
```

No. 9
```
function tampilkanBilangan(angka, awal, akhir) {
    for (let i = awal; i <= akhir; i++) {
        if (String(i).includes(angka.toString())) {
            console.log(i);
        }
    }
}
```
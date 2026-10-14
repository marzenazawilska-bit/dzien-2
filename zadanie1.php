<?php
$age = readline("Podaj sw�j rok urodzenia: ");

$age = intval($age);

$wiek = 2026 - $age;

echo "Tw�j wiek to: " . $wiek . PHP_EOL;

$imie = readline("Podaj swoje imie: ");
$nazwisko = readline("Podaj swoje nazwisko: ");

function generujPesel($imie, $nazwisko, $rokUrodzenia) {
    // Losujemy miesi?c (1-12) i dzie? (1-28 dla bezpiecze?stwa)
    $miesiac = rand(1, 12);
    $dzien = rand(1, 28);
    
    // Kodowanie stulecia w miesi?cu dla PESEL
    $rokKrotki = $rokUrodzenia % 100;
    $stulecie = intdiv($rokUrodzenia, 100);
    
    if ($stulecie == 18) {
        $miesiac += 80;
    } elseif ($stulecie == 20) {
        $miesiac += 20;
    } elseif ($stulecie == 21) {
        $miesiac += 40;
    } elseif ($stulecie == 22) {
        $miesiac += 60;
    } // Dla lat 1900-1999 miesi?c pozostaje bez zmian (+0)

    // Formatowanie daty do YYMMDD (2 cyfry roku, 2 cyfry miesi?ca, 2 cyfry dnia)
    $dataStr = sprintf("%02d%02d%02d", $rokKrotki, $miesiac, $dzien);

    // Okre?lenie p?ci na podstawie imienia
    $imieLower = mb_strtolower($imie);
    $czyKobieta = str_ends_with($imieLower, 'a') && !in_array($imieLower, ['kuba', 'barnaba', 'kosma']);

    // Losowanie numeru porz?dkowego (3 cyfry)
    $seria = rand(0, 999);
    
    // Cyfra oznaczaj?ca p?e?: parzysta dla kobiet, nieparzysta dla m??czyzn
    $plecCyfra = rand(0, 4) * 2; 
    if (!$czyKobieta) {
        $plecCyfra += 1; 
    }

    // Sk?adanie pierwszych 10 cyfr PESEL
    $podstawa = $dataStr . sprintf("%03d", $seria) . $plecCyfra;

    // Obliczanie cyfry kontrolnej algorytmem wag (1, 3, 7, 9, 1, 3, 7, 9, 1, 3)
    $wagi = [1, 3, 7, 9, 1, 3, 7, 9, 1, 3];
    $suma = 0;
    
    for ($i = 0; $i < 10; $i++) {
        $suma += (int)$podstawa[$i] * $wagi[$i];
    }
    
    $reszta = $suma % 10;
    $cyfraKontrolna = ($reszta == 0) ? 0 : (10 - $reszta);

    // Ostateczny PESEL
    return $podstawa . $cyfraKontrolna;
}

$potencjalnyPesel = generujPesel($imie, $nazwisko, $age);

echo "Dane: $imie $nazwisko, lat $wiek\n";
echo "Wygenerowany potencjalny PESEL: $potencjalnyPesel\n";

// Definiujemy nazw? pliku, w kt�rym zapiszemy dane
$fileName = "wiek_uzytkownika.txt";

// Tworzymy tre?? do zapisu
$data = "Wiek: $wiek | Imi? i nazwisko: $imie $nazwisko | PESEL: $potencjalnyPesel | Zapisano: " . date("Y-m-d H:i:s") . "\n";

// Zapisujemy dane do pliku
if (file_put_contents($fileName, $data, FILE_APPEND)) {
    echo "Sukces! Dane zosta?y zapisane do pliku '$fileName'.\n";
} else {
    echo "Wystąpił błąd podczas zapisu do pliku.\n";
}
?>
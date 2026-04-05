<?php
function analyzeText(string $text): array {
    $text = trim($text);
    $clean = preg_replace('/[\p{P}\p{S}]+/u', ' ', $text);
    $clean = mb_strtolower($clean, 'UTF-8');
    $clean = preg_replace('/\s+/u', ' ', $clean);

    $words = [];
    if (mb_strlen($clean, 'UTF-8') > 0) {
        $words = preg_split('/\s+/u', $clean, -1, PREG_SPLIT_NO_EMPTY);
    }

    $count = count($words);
    $freq = array_count_values($words);
    arsort($freq);

    return [
        'wordCount' => $count,
        'uniqueWords' => count($freq),
        'freq' => $freq,
    ];
}

$analysis = null;
$textValue = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $textValue = trim((string)($_POST['text_input'] ?? ''));
    $analysis = analyzeText($textValue);
}
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Matn tahlil mini</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container">
        <header>
            <h1>Matn tahlil mini</h1>
            <p>Word count va frequency bo‘yicha matn tahlili. Sayt Open Serverda PHP bilan ishlaydi.</p>
        </header>

        <form method="post" action="">
            <label for="text_input">Matn kiriting</label>
            <textarea id="text_input" name="text_input" rows="12" placeholder="Bu yerga matn kiriting..."><?php echo htmlspecialchars($textValue, ENT_QUOTES | ENT_SUBSTITUTE); ?></textarea>
            <button type="submit">Tahlil qilish</button>
        </form>

        <?php if ($analysis !== null): ?>
            <section class="results">
                <h2>Tahlil natijasi</h2>
                <div class="summary">
                    <div><strong>Umumiy so'zlar soni:</strong> <?php echo $analysis['wordCount']; ?></div>
                    <div><strong>Yagona so'zlar soni:</strong> <?php echo $analysis['uniqueWords']; ?></div>
                </div>

                <?php if ($analysis['wordCount'] === 0): ?>
                    <p class="notice">Iltimos, matn kiriting.</p>
                <?php else: ?>
                    <div class="frequency">
                        <h3>So'zlar chastotasi</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>So'z</th>
                                    <th>Chastota</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($analysis['freq'] as $word => $count): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($word, ENT_QUOTES | ENT_SUBSTITUTE); ?></td>
                                        <td><?php echo $count; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </section>
        <?php endif; ?>

        <footer>
            <p>Visual Studio va Open Server uchun tayyorlangan matn tahlil loyihasi.</p>
        </footer>
    </div>
</body>
</html>

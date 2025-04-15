<?php
include 'includes/config.php';
include 'includes/header.php';

$candidates = readJSON('data/candidates.json');
$votes = readJSON('data/votes.json');
$results = [];

$totalVotes = 0;

foreach ($candidates as $c) {
    $results[$c['id']] = 0;
}

foreach ($votes as $v) {
    if (isset($results[$v['candidate_id']])) {
        $results[$v['candidate_id']]++;
        $totalVotes++;
    }
}
?>

<q></q>
<div class="container border-2 border-white ml-10 " >
<div style="max-width: 500px; margin: 40px auto; padding: 20px 30px; border-radius: 15px; background: linear-gradient(135deg, #e0f2f1, #a5d6a7); box-shadow: 0 8px 16px rgba(0,0,0,0.2); text-align: center;">
  <h2 style="margin: 0; color: #2e7d32; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 28px; letter-spacing: 1px;">
    🗳️ Election Results
  </h2>
</div>


    <?php foreach ($candidates as $c): 
        $voteCount = $results[$c['id']];
        $percentage = $totalVotes > 0 ? round(($voteCount / $totalVotes) * 100, 2) : 0;
    ?>
        <div class="candidate-card" style="flex-direction: column; align-items: flex-start;">
            <div class="info" style="width: 100%;">
                <h3 style="font-size: 24px; color: #333; margin-bottom: 5px;">
                    <span style="background-color: #e8f5e9; padding: 6px 12px; border-radius: 8px; color: #2e7d32; font-weight: bold;">
                        <?= htmlspecialchars($c['name']) ?>
                    </span>
                </h3>
                <p style="font-size: 16px; color: #666; margin-bottom: 8px;">
                    <?= $voteCount ?> vote<?= $voteCount !== 1 ? 's' : '' ?> (<?= $percentage ?>%)
                </p>
                <div style="background-color: #ddd; border-radius: 20px; overflow: hidden; height: 20px; margin-bottom: 10px;">
                    <div style="width: <?= $percentage ?>%; background-color: #4CAF50; height: 100%;"></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <p style="text-align: center; margin-top: 40px; font-weight: bold; font-size: 18px;">
        Total Votes Cast: <?= $totalVotes ?>
    </p>
</div>

<?php include 'includes/footer.php'; ?>

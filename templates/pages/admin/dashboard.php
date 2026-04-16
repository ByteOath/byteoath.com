<?php
/** @var array  $rows  */
/** @var int    $total */

$cols = ['ID', 'Name', 'Email', 'Company', 'Platform', 'Budget', 'Message', 'IP', 'Date', ''];
?>
<div style="min-height:100vh;display:flex;flex-direction:column;">

  <!-- Top bar -->
  <header style="background:#111827;border-bottom:1px solid rgba(0,212,255,0.1);padding:0 2rem;">
    <div style="max-width:1400px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;height:60px;">
      <div style="display:flex;align-items:center;gap:1.5rem;">
        <img src="/assets/brand/logo_white.svg" alt="ByteOath" style="height:22px;">
        <span style="color:#8E9AAF;font-size:0.8rem;font-family:'Fira Code',monospace;">/ admin</span>
      </div>
      <div style="display:flex;align-items:center;gap:1.5rem;">
        <span style="font-family:'Fira Code',monospace;font-size:0.75rem;color:#8E9AAF;">
          <?= $total ?> submission<?= $total !== 1 ? 's' : '' ?>
        </span>
        <a href="/admin/logout"
           style="font-size:0.775rem;color:#8E9AAF;text-decoration:none;padding:0.4rem 0.875rem;border:1px solid rgba(255,255,255,0.1);border-radius:6px;transition:all 0.2s;"
           onmouseover="this.style.borderColor='rgba(239,68,68,0.4)';this.style.color='#fca5a5'"
           onmouseout="this.style.borderColor='rgba(255,255,255,0.1)';this.style.color='#8E9AAF'">
          Logout
        </a>
      </div>
    </div>
  </header>

  <!-- Content -->
  <main style="flex:1;padding:2rem;max-width:1400px;margin:0 auto;width:100%;">

    <div style="margin-bottom:1.5rem;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
      <h1 style="font-family:'Montserrat',sans-serif;font-size:1.25rem;font-weight:700;">Contact Submissions</h1>
      <span style="font-family:'Fira Code',monospace;font-size:0.75rem;color:#8E9AAF;">
        SQLite → /storage/submissions.sqlite
      </span>
    </div>

    <?php if (empty($rows)): ?>
      <div style="background:#1E2A42;border:1px dashed rgba(0,212,255,0.15);border-radius:12px;padding:3rem;text-align:center;color:#8E9AAF;font-size:0.875rem;">
        No submissions yet. The contact form will populate this table.
      </div>
    <?php else: ?>
      <div style="background:#1E2A42;border:1px solid rgba(0,212,255,0.1);border-radius:12px;overflow:hidden;">
        <div style="overflow-x:auto;">
          <table style="width:100%;border-collapse:collapse;font-size:0.825rem;">
            <thead>
              <tr style="background:rgba(0,212,255,0.06);border-bottom:1px solid rgba(0,212,255,0.12);">
                <?php foreach ($cols as $col): ?>
                  <th style="padding:0.75rem 1rem;text-align:left;font-family:'Fira Code',monospace;font-size:0.7rem;letter-spacing:0.06em;text-transform:uppercase;color:#8E9AAF;white-space:nowrap;">
                    <?= $col ?>
                  </th>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($rows as $i => $row): ?>
                <tr style="border-bottom:1px solid rgba(255,255,255,0.04);<?= $i % 2 === 0 ? '' : 'background:rgba(255,255,255,0.015);' ?>"
                    onmouseover="this.style.background='rgba(0,212,255,0.04)'"
                    onmouseout="this.style.background='<?= $i % 2 === 0 ? 'transparent' : 'rgba(255,255,255,0.015)' ?>'">
                  <td style="padding:0.75rem 1rem;color:#8E9AAF;font-family:'Fira Code',monospace;"><?= $row['id'] ?></td>
                  <td style="padding:0.75rem 1rem;font-weight:500;white-space:nowrap;"><?= htmlspecialchars($row['name']) ?></td>
                  <td style="padding:0.75rem 1rem;">
                    <a href="mailto:<?= htmlspecialchars($row['email']) ?>"
                       style="color:#00D4FF;text-decoration:none;font-family:'Fira Code',monospace;font-size:0.775rem;">
                      <?= htmlspecialchars($row['email']) ?>
                    </a>
                  </td>
                  <td style="padding:0.75rem 1rem;color:#8E9AAF;"><?= htmlspecialchars($row['company'] ?? '—') ?></td>
                  <td style="padding:0.75rem 1rem;">
                    <?php if ($row['platform']): ?>
                      <span style="font-family:'Fira Code',monospace;font-size:0.7rem;padding:0.2rem 0.6rem;border-radius:4px;background:rgba(0,212,255,0.1);color:#00D4FF;border:1px solid rgba(0,212,255,0.2);">
                        <?= htmlspecialchars($row['platform']) ?>
                      </span>
                    <?php else: ?>
                      <span style="color:#8E9AAF;">—</span>
                    <?php endif; ?>
                  </td>
                  <td style="padding:0.75rem 1rem;color:#8E9AAF;white-space:nowrap;"><?= htmlspecialchars($row['budget'] ?? '—') ?></td>
                  <td style="padding:0.75rem 1rem;max-width:260px;">
                    <span title="<?= htmlspecialchars($row['message']) ?>"
                          style="display:block;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#8E9AAF;cursor:help;">
                      <?= htmlspecialchars($row['message']) ?>
                    </span>
                  </td>
                  <td style="padding:0.75rem 1rem;color:#8E9AAF;font-family:'Fira Code',monospace;font-size:0.725rem;white-space:nowrap;">
                    <?= htmlspecialchars($row['ip'] ?? '—') ?>
                  </td>
                  <td style="padding:0.75rem 1rem;color:#8E9AAF;font-family:'Fira Code',monospace;font-size:0.725rem;white-space:nowrap;">
                    <?= htmlspecialchars($row['created_at']) ?>
                  </td>
                  <td style="padding:0.75rem 1rem;">
                    <a href="/admin/delete?id=<?= $row['id'] ?>"
                       onclick="return confirm('Delete this submission?')"
                       style="font-size:0.75rem;color:#8E9AAF;text-decoration:none;padding:0.3rem 0.6rem;border:1px solid rgba(239,68,68,0.2);border-radius:4px;transition:all 0.2s;"
                       onmouseover="this.style.color='#fca5a5';this.style.borderColor='rgba(239,68,68,0.5)'"
                       onmouseout="this.style.color='#8E9AAF';this.style.borderColor='rgba(239,68,68,0.2)'">
                      Delete
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php endif; ?>
  </main>

  <footer style="padding:1rem 2rem;text-align:center;border-top:1px solid rgba(255,255,255,0.04);">
    <p style="font-family:'Fira Code',monospace;font-size:0.7rem;color:#8E9AAF;">
      ByteOath Admin · <a href="/" style="color:#8E9AAF;text-decoration:none;" onmouseover="this.style.color='#00D4FF'" onmouseout="this.style.color='#8E9AAF'">← Back to site</a>
    </p>
  </footer>
</div>


<?php
$page_title = 'Student Club · Member area';
$page_description = 'Student Club member dashboard: save print jobs and shop student-priced products at Paperboy JA.';
$page_url = 'student-printing/member-area.php';
$current_page = 'student-member';
$depth = 1;
$student_section = true;

$base_url = '../';

include __DIR__ . '/../includes/head.php';
include __DIR__ . '/../includes/nav-student.php';
?>

  <section class="student-page-banner student-member-banner">
    <div class="container">
      <h1>Student Club · Member area</h1>
      <p>Your dashboard — save print jobs &amp; shop member pricing</p>
    </div>
  </section>

  <section class="student-member-intro">
    <div class="container">
      <p class="student-member-lead">Welcome to the member shopping area. Use your <strong>member number</strong> in-store or at checkout so we can apply your <strong>15% Student Club discount</strong> on eligible student printing. <a href="membership-card.php">View your membership card</a> if you joined online.</p>
      <div class="student-member-id-box">
        <label for="memberNumberDisplay">Remember my member number on this device</label>
        <div class="student-member-id-row">
          <input type="text" id="memberNumberDisplay" name="member_number" placeholder="e.g. PB-STU-ABC123" autocomplete="off" maxlength="64">
          <button type="button" class="btn btn-blue" id="memberNumberSave">Save</button>
          <button type="button" class="btn btn-dark" id="memberNumberClear">Clear</button>
        </div>
        <p class="student-member-id-hint" id="memberNumberStatus" aria-live="polite"></p>
      </div>
    </div>
  </section>

  <section class="student-member-dashboard">
    <div class="container">
      <h2 class="student-dash-heading">Dashboard</h2>
      <div class="student-dash-grid">
        <div class="student-dash-card student-dash-card-wide">
          <h3>Saved print jobs</h3>
          <p class="student-dash-sub">Keep notes for assignments, specs, or quotes — stored in your browser on this device. Add a title and details, then save. (Full cloud sync can be added when accounts go live.)</p>
          <form id="studentJobForm" class="student-job-form">
            <label for="jobTitle">Job title</label>
            <input type="text" id="jobTitle" required maxlength="120" placeholder="e.g. Thesis Chapter 3 — colour, A4, bound">
            <label for="jobNotes">Details</label>
            <textarea id="jobNotes" rows="4" maxlength="2000" placeholder="Pages, paper, deadline, file names…"></textarea>
            <button type="submit" class="btn btn-blue">Save job</button>
          </form>
          <div class="student-job-list-wrap">
            <h4>Your saved jobs</h4>
            <ul id="studentJobList" class="student-job-list" aria-live="polite"></ul>
            <p id="studentJobEmpty" class="student-job-empty">No saved jobs yet.</p>
          </div>
        </div>
        <div class="student-dash-card">
          <h3>Member perks</h3>
          <ul class="student-dash-perks">
            <li><strong>15% off</strong> student-related printing</li>
            <li><strong>J$500</strong> membership per school term</li>
            <li>Electronic membership card &amp; unique number</li>
            <li>Shop below — member pricing where products are tagged for students</li>
          </ul>
          <a href="print.php" class="btn btn-blue" style="margin-bottom:0.75rem;display:inline-block">Order document printing</a>
          <br>
          <a href="join.php" class="link-dark">Not a member yet? Join the Club</a>
        </div>
      </div>
    </div>
  </section>

  <section class="student-member-shop product-content">
    <div class="container">
      <h2 class="student-shop-heading">Student Club shop</h2>
      <p class="student-shop-lead">Browse products reserved or priced for Student Club members. At checkout, use your member number or show your card in-store. Need something custom? <a href="<?= $base_url ?>request-a-quote.php?product=Student%20printing">Request a quote</a>.</p>
      <?php
      if (!empty($paysynk_embed)) {
        echo $paysynk_embed;
      } elseif (!empty($paysynk_product)) {
        paysynk_product_slot($paysynk_product);
      } else {
        echo '<p class="student-shop-lead">Member-priced products will appear here once the PaySynk catalogue is connected. You can still use the cart from any product page.</p>';
      }
      ?>
    </div>
  </section>

  <section class="student-back">
    <div class="container">
      <a href="index.php" class="back-to-main">← Back to Student Printing home</a>
    </div>
  </section>

  <script>
  (function() {
    var STORAGE_JOBS = 'paperboyStudentClubJobs';
    var STORAGE_MEMBER = 'paperboyStudentClubMemberNumber';

    function $(id) { return document.getElementById(id); }

    function loadJobs() {
      try {
        var raw = localStorage.getItem(STORAGE_JOBS);
        return raw ? JSON.parse(raw) : [];
      } catch (e) { return []; }
    }

    function saveJobs(jobs) {
      localStorage.setItem(STORAGE_JOBS, JSON.stringify(jobs));
    }

    function renderJobs() {
      var list = $('studentJobList');
      var empty = $('studentJobEmpty');
      if (!list) return;
      var jobs = loadJobs();
      list.innerHTML = '';
      if (!jobs.length) {
        empty.style.display = 'block';
        return;
      }
      empty.style.display = 'none';
      jobs.forEach(function(job) {
        var li = document.createElement('li');
        li.className = 'student-job-item';
        li.setAttribute('data-id', job.id);
        var title = document.createElement('strong');
        title.textContent = job.title;
        var meta = document.createElement('span');
        meta.className = 'student-job-meta';
        meta.textContent = job.savedAt ? ' · Saved ' + job.savedAt : '';
        var notes = document.createElement('p');
        notes.className = 'student-job-notes';
        notes.textContent = job.notes || '';
        var del = document.createElement('button');
        del.type = 'button';
        del.className = 'student-job-delete';
        del.textContent = 'Remove';
        del.setAttribute('aria-label', 'Remove job: ' + job.title);
        del.addEventListener('click', function() {
          var next = loadJobs().filter(function(j) { return j.id !== job.id; });
          saveJobs(next);
          renderJobs();
        });
        li.appendChild(title);
        li.appendChild(meta);
        li.appendChild(notes);
        li.appendChild(del);
        list.appendChild(li);
      });
    }

    var form = $('studentJobForm');
    if (form) {
      form.addEventListener('submit', function(ev) {
        ev.preventDefault();
        var title = ($('jobTitle').value || '').trim();
        var notes = ($('jobNotes').value || '').trim();
        if (!title) return;
        var jobs = loadJobs();
        jobs.unshift({
          id: 'job-' + Date.now(),
          title: title,
          notes: notes,
          savedAt: new Date().toLocaleString()
        });
        saveJobs(jobs);
        $('jobTitle').value = '';
        $('jobNotes').value = '';
        renderJobs();
      });
    }

    var memInput = $('memberNumberDisplay');
    var memStatus = $('memberNumberStatus');
    if (memInput) {
      try {
        var saved = localStorage.getItem(STORAGE_MEMBER);
        if (saved) memInput.value = saved;
      } catch (e) {}
      $('memberNumberSave').addEventListener('click', function() {
        var v = (memInput.value || '').trim();
        if (v) {
          localStorage.setItem(STORAGE_MEMBER, v);
          memStatus.textContent = 'Member number saved on this device.';
        } else {
          localStorage.removeItem(STORAGE_MEMBER);
          memStatus.textContent = 'Cleared.';
        }
      });
      $('memberNumberClear').addEventListener('click', function() {
        memInput.value = '';
        localStorage.removeItem(STORAGE_MEMBER);
        memStatus.textContent = 'Member number cleared.';
      });
    }

    renderJobs();
  })();
  </script>

<?php include __DIR__ . '/../includes/footer.php'; ?>

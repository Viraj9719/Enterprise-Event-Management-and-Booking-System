// ── Sidebar toggle ──
    const sidebar = document.getElementById('sidebar');
    const mainWrap = document.getElementById('mainWrap');
    document.getElementById('sidebarToggle').addEventListener('click', () => {
      sidebar.classList.toggle('mini');
      mainWrap.classList.toggle('mini');
    });

    // ── Live Clock ──
    function updateClock() {
      const now = new Date();
      const timeStr = now.toLocaleTimeString('en-US', { hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' });
      const dateStr = now.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' });
      const yearStr = now.getFullYear();

      document.getElementById('clockTime').textContent = timeStr;
      document.getElementById('clockDateSub').textContent = `${dateStr}, ${yearStr}`;
      document.getElementById('topbarDate').textContent = now.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    }
    updateClock();
    setInterval(updateClock, 1000);
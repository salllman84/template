document.addEventListener('DOMContentLoaded',function(){
  const menuToggle=document.getElementById('menuToggle');
  const mobileNav=document.getElementById('mobileNav');
  const menuOverlay=document.getElementById('menuOverlay');
  if(menuToggle && mobileNav){
    const toggle=()=>{
      const expanded=menuToggle.getAttribute('aria-expanded')==='true';
      menuToggle.setAttribute('aria-expanded',(!expanded).toString());
      mobileNav.hidden=expanded;
      mobileNav.style.display=expanded?'none':'block';
      if(menuOverlay){menuOverlay.hidden=expanded;menuOverlay.style.display=expanded?'none':'block';}
    };
    menuToggle.addEventListener('click',toggle);
    if(menuOverlay) menuOverlay.addEventListener('click',toggle);
    mobileNav.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>{if(menuToggle.getAttribute('aria-expanded')==='true') toggle();}));
    document.addEventListener('keydown',e=>{if(e.key==='Escape'){menuToggle.setAttribute('aria-expanded','false');mobileNav.hidden=true;mobileNav.style.display='none';if(menuOverlay){menuOverlay.hidden=true;menuOverlay.style.display='none';}}});
  }

  const search=document.getElementById('mg-search');
  const suggest=document.getElementById('mg-suggest');
  if(search && suggest){
    let timer;
    search.addEventListener('input',()=>{
      clearTimeout(timer);
      const q=search.value.trim();
      if(!q){suggest.style.display='none';return;}
      timer=setTimeout(()=>{
        fetch(MG.rest+'wp/v2/search?search='+encodeURIComponent(q)+'&_fields=title,url&per_page=5')
        .then(r=>r.json()).then(data=>{
          if(!data.length){suggest.style.display='none';return;}
          suggest.innerHTML=data.map(it=>`<a class="suggest-item" href="${it.url}">${it.title}</a>`).join('');
          suggest.style.display='block';
        });
      },200);
    });
    document.addEventListener('click',e=>{if(!suggest.contains(e.target) && e.target!==search) suggest.style.display='none';});
  }

  const tocList=document.getElementById('toc-list');
  if(tocList){
    const headers=document.querySelectorAll('.entry-content h2, .entry-content h3');
    headers.forEach((h,i)=>{
      if(!h.id) h.id='h-'+i;
      const li=document.createElement('li');
      li.innerHTML=`<a href="#${h.id}">${h.textContent}</a>`;
      tocList.appendChild(li);
    });
  }

  const progress=document.getElementById('progress');
  const toTop=document.getElementById('toTop');
  const onScroll=()=>{
    const h=document.documentElement.scrollHeight-window.innerHeight;
    const y=window.scrollY;
    if(progress) progress.style.width=(y/h*100)+'%';
    if(toTop) toTop.style.display=y>300?'block':'none';
  };
  window.addEventListener('scroll',onScroll);
  onScroll();
  if(toTop) toTop.addEventListener('click',()=>window.scrollTo({top:0,behavior:'smooth'}));

  const copyBtn=document.getElementById('copyLink');
  if(copyBtn){
    copyBtn.addEventListener('click',()=>{
      navigator.clipboard.writeText(copyBtn.dataset.url).then(()=>{
        const txt=copyBtn.textContent;
        copyBtn.textContent='Copied!';
        setTimeout(()=>{copyBtn.textContent=txt;},1500);
      });
    });
  }
});

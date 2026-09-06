function ChangeTab(tabname) {
    if (window.matchMedia('screen and (min-width:641px)').matches) { 
	//641px以上のデスクトップでの処理
    // 全部消す
    document.getElementById('tab1').style.display = 'none';
    document.getElementById('tab2').style.display = 'none';
    document.getElementById('tab3').style.display = 'none';
    document.getElementById('tab4').style.display = 'none';
    document.getElementById('tab5').style.display = 'none';
    document.getElementById('tab6').style.display = 'none';
    // 指定箇所のみ表示
    if(tabname) {
        document.getElementById(tabname).style.display = 'block';
        }
    }
}

// オーディオプレイヤー類オブジェクト
        var audioPlayer = $("#audioplayer").get(0);
        var playBtn = $("#playBtn").get(0);
        var pauseBtn= $("#pauseBtn").get(0);
        var loaded = false;
        var progressiveBar;
        var music_number=0;
        var player_control = $(".player_control_progress2").get(0);
        //次の曲があれば再生
        $('#forward').on('click', function() {
            var number=music_number+1;
            while(filePath==''){
                number+=1;
            }
            var filePath = '';
            var artistName = '';
            var musicName = '';
            
            $('.music-list').each(function(){
                if(number == $(this).find('.number').get(0).value){
                    filePath = $(this).find('.file_path').get(0).value;
                    artistName = $(this).find('.artist_name').get(0).value;
                    musicName = $(this).find('.music_name').get(0).value;
                }
            
               
            });
            if(filePath!=''){
                playSong(filePath, artistName, musicName, number);
            }
        });
        //前の曲を再生する
        $('#backward').on('click', function() {
            var number=music_number-1;
            var filePath = '';
            var artistName = '';
            var musicName = '';
            
            $('.music-list').each(function(){
                if(number == $(this).find('.number').get(0).value){
                    filePath = $(this).find('.file_path').get(0).value;
                    artistName = $(this).find('.artist_name').get(0).value;
                    musicName = $(this).find('.music_name').get(0).value;
                }
            
               
            })
            if(filePath!=''){
                playSong(filePath, artistName, musicName, number);
            }
        });
        // オーディオプレイヤー再生ボタン押下時の処理
        $('#playBtn').on('click', function() {
            if (loaded) {
                audioPlay();
            }
        });
        
        // オーディオプレイヤー一時停止ボタン押下時の処理
        $('#pauseBtn').on('click', function() {
            audioStop();
        });
        
        // 曲リスト押下時の処理
        $('.music-list').on('click', function() {
            // 再生表示をリセット
            resetPlayIcon();
            
            // 再生表示を付与
            $($(this).find('.play_icon').get(0)).html('<i class="fas fa-play"></i>');
            
            // パラメータ取得
            var filePath = $(this).find('.file_path').get(0).value;
            var artistName = $(this).find('.artist_name').get(0).value;
            var musicName = $(this).find('.music_name').get(0).value;
            var number = $(this).find('.number').get(0).value;
            
            playSong(filePath, artistName, musicName, number);
        });
        
        // 曲を設定して再生
        function playSong(filePath, artistName, musicName, number) {
            var player_artist = $("#player_artist").get(0);
            music_number=parseInt(number);

            // 曲を読込
            audioPlayer.innerHTML=`<source src="` + filePath + `" types="audio/mp3">`;
            audioPlayer.load();
            
            // 曲情報をセット
            player_artist.innerHTML=
                '<h3>' + artistName + 
                "</br><span class='play_icon'>" + number + '.</span>' +
                '<span>' + musicName  + '</span>' + '</h3>';
            
            
            audioPlayer.addEventListener('loadedmetadata',function(e) {
                // 再生
                audioPlay();
                loaded = true;
            });
        }
        
        // オーディオ再生
        // オーディオ再生
        function audioPlay() {
            audioPlayer.play();
            player_control.min = 0;
            player_control.max = audioPlayer.duration;
            startProgressiveBar();
            
            playBtn.style.display='none';
            pauseBtn.style.display='inline';
        }
        // function audioPlay() {
        //     audioPlayer.play();
        //     startProgressiveBar();
        //     playBtn.style.display='none';
        //     pauseBtn.style.display='inline';
        // }
        
        // オーディオ一時停止
        function audioStop() {
            audioPlayer.pause();
            stopProgressiveBar();
            playBtn.style.display='inline';
            pauseBtn.style.display='none';
        }
        
        // オーディオが曲を再生し終わった場合
        audioPlayer.addEventListener("ended", function(){
            // プログレッシブバーをリセット
		    $('.player_control_progress2').css('width','0%');
            // 再生表示をリセット
            resetPlayIcon();
            
            // 曲情報をリセット
            player_artist.innerHTML = '';
            
            playBtn.style.display='inline';
            pauseBtn.style.display='none';
            
            loaded = false;
        }, false);
        
        function resetPlayIcon() {
            $('.music-list').each(function(){
                var number = $(this).find('.number').get(0).value;
                $($(this).find('.play_icon').get(0)).html(number);
            })
        
        }
        
        // プログレッシブバーを動かす
          function startProgressiveBar() {
            
            progressiveBar = setInterval(function() {
                var maxTime = player_control.max;    
                var currentTime = audioPlayer.currentTime;
                player_control.value = currentTime;
                
                if (currentTime >= maxTime) {
                    stopProgressiveBar();
                }
            }, 1);
        }
        // function startProgressiveBar() {
            
        //     progressiveBar = setInterval(function() {
        //         var audioTime = audioPlayer.duration;    
        //         var currentTime = audioPlayer.currentTime;
                
        //         var percent = currentTime/audioTime * 100;
        //         $('.player_control_progress2').css('width', percent + '%');
                
        //         if (percent >= 100) {
        //             stopProgressiveBar();
        //         }
        //     }, 1);
        // }
        $('.player_control_progress2').on('input change', function() {
            audioPlayer.currentTime = player_control.value;
        });
        // プログレッシブバーを止める
        function stopProgressiveBar() {
            clearInterval(progressiveBar);
        }
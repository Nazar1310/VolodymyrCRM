$(document).ready(function () {
    $('.wakeup').click(function () {
        wakeup($(this).data('wakeup'));
    });
    getAccount();
    setInterval(getAccount, 2000);
    getStat();
});

function wakeup(period) {
    $('.wakeup').hide();
    const data = new FormData();
    data.append('wakeup',period);
    data.append('_token',$('meta[name="csrf-token"]').attr('content'));
    $.ajax({type:'POST',url:'/account',data,processData:false,contentType:false,
        success: function (res) {
            $('.wakeup').show();
            if(res.status === 'success'){
                setData(res.data);
            }
        }
    });
}
function getAccount() {
    const data = new FormData();
    data.append('_token',$('meta[name="csrf-token"]').attr('content'));
    $.ajax({type:'POST',url:'/account',data,processData:false,contentType:false,
        success: function (res) {
            if(res.status === 'success'){
                setData(res.data);
            }
        }
    });
}

function getStat() {
    const data = new FormData();
    data.append('_token',$('meta[name="csrf-token"]').attr('content'));
    $.ajax({type:'POST',url:'/stat',data,processData:false,contentType:false,
        success: function (res) {
            if(res.status === 'success'){
                for(let key in res.countUniqueAccounts){
                    $('#countUniqueAccounts').append(`
                        <p class="mb-0 ml-4">${key}:<span class="text-info font-weight-bold">
                        ${res.countUniqueAccounts[key]}
                        ${res.countUniqueAccountsStatus3[key]?`(<span class="text-danger">${res.countUniqueAccountsStatus3[key]}</span>)`:''}
                        </span></p>`
                    )
                }
            }
        }
    });
}
function setData(data) {
    $('#bot_acc-act').html(data.bot_act);
    $('#bot_acc-block').html(data.bot_block);
    $('#bot_acc-sleep').html(data.bot_sleep);
    $('#bot_acc-sleep2').html(data.bot_sleep2);
    $('#bot_acc-sleep3').html(data.bot_sleep3);
    if (data.bot_active) {
        $('#bot_username').html(data.bot_active.login);
        $('#bot_get').html(data.bot_active.get);
        $('#bot_ago').html(time2TimeAgo(data.bot_active.time_block));
    }
}
function time2TimeAgo(ts) {
    var d = new Date();  // Gets the current time
    var nowTs = Math.floor(d.getTime() / 1000); // getTime() returns milliseconds, and we need seconds, hence the Math.floor and division by 1000
    var seconds = nowTs - ts;
    if (seconds > 3600) {
        return Math.floor(seconds / 3600) + " hours ago";
    }
    if (seconds > 1800) {
        return "Half an hour ago";
    }
    if (seconds > 60) {
        return Math.floor(seconds / 60) + " minutes ago";
    }
}

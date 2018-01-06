$('document').ready(function(){ refreshData(); });

function refreshData()
{ $('#container').load("modules/data_.php",
    function()
    { setTimeout(refreshData, 20000);
    });
};

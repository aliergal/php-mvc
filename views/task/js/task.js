$(function() {
    
    $.get('task/getAll', function(o) {
        
        for (var i = 0; i < o.length; i++)
        {
            $('#task_list').append('<div>' + o[i].task + '<a class="del" rel="'+o[i].id+'" href="#">X</a></div>');
        }
        
        $('.del').live('click', function() {
            delItem = $(this);
            var id = $(this).attr('rel');
            
            $.post('task/delete', {'id': id}, function(o) {
                delItem.parent().remove();
            }, 'json');
            
            return false;
        });
        
    }, 'json');
    
    
    
    $('#insert_task').submit(function() {
        var url = $(this).attr('action');
        var data = $(this).serialize();
        
        $.post(url, data, function(o) {
            $('#task_list').append('<div>' + o.task + '<a class="del" rel="'+ o.id +'" href="#">X</a></div>');        
        }, 'json');
        
        
        return false;
    });

});
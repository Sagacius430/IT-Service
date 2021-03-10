jQuery(function($){

    var domains = ['msn.com','qq.com', 'sky.com', 'icloud.com','mac.com', 'googlemail.com',
    'gmail.com','google.com','aol.com','outlook.com', 'uol.com.br', 'terra.com.br', 'yahoo.com',
    'hotmail.com', 'bol.com.br', 'globomail.com.br', ];

    $('.mailcheck').blur(function(){
        var input = $(this);
        var parent = input.parents('.control-group');
        input.mailcheck({
            domains : domains,
            suggested: function(element, suggestion){
                input.next('span').remove();
                $('<span class="help-inline"/>').insertAfter(input).
                    append('Você quis dizer <a href="#">'+ 
                        suggestion.full+'</a>').find('a').click(function(e){
                            e.preventDefault();
                            input.val($(this).text());
                            input.trigger('blur');
                    }); 
                    parent.addClass('warning'); 
            },
            empty : function(element){
                input.next('span').remove();
                parent.removeClass('warning');
            }
        });
    });

});

$(document).ready(function(){
        var options = {
        translation: {
            'A': {pattern: /[A-Z]/},
            'a': {pattern: /[a-zA-Z]/},
            'S': {pattern: /[a-zA-Z0-9]/},
            'L': {pattern: /[a-z]/},
            'R':{pattern: /[R$]/},
        }
        }
        // $("#name").mask("aaaaaaaaaaaaaaaa", options)        
        $("#fone").mask("(00) 0 0000-0000")
        $("#number").mask("0#") 
        $("#date").mask('00/00/0000');                  
        $("#uf").mask("UU",{
            translation: {
                'U': {pattern: /[A-Z]/}
            },
            
        })
        $("#value").mask("9.999,99", {reverse: true})

        $("#value").blur(function(event){
            if ($(this).val()){
                $("#value").mask("R$ 0.000,00")
            }
        })
        
    })

    //Verifica força da pwd
    function testPwd(){
        pwd = document.getElementById("password").value;
            Strength = 0;
        show = document.getElementById("showStrength");
        if((pwd.length >= 4) && (pwd.length <= 7)){
            Strength += 10;
        }else if(pwd.length>7){
            Strength += 25;
        }
        if(pwd.match(/[a-z]+/)){
            Strength += 10;
        }
        if(pwd.match(/[A-Z]+/)){
            Strength += 20;
        }
        if(pwd.match(/d+/)){
            Strength += 20;
        }
        if(pwd.match(/W+/)){
            Strength += 25;
        }
        return showAnswer();
    }
    function showAnswer(){
        if(Strength < 30){
            showStrength.innerHTML = '<tr><td bgcolor="red" width="'+Strength+'"></td><td>Fraca </td></tr>';
        }else if((Strength >= 30) && (Strength < 60)){
            showStrength.innerHTML = '<tr><td bgcolor="yellow" width="'+Strength+'"></td><td>Média </td></tr>';;
        }else if((Strength >= 60) && (Strength < 85)){
            showStrength.innerHTML = '<tr><td bgcolor="blue" width="'+Strength+'"></td><td>Forte </td></tr>';
        }else{
            showStrength.innerHTML = '<tr><td bgcolor="green" width="'+Strength+'"></td><td>Excelente </td></tr>';
        }
    }


    //Mascara Cliente.create

    //blur:quando clicar fora
    //#zip_code: id do CEP no HTML
    $(document).on('blur','#zip_code', function(){
        //this.val: pega o valor e coloca na variável
        let zipcode = $(this).val();
        $("#zip_code").mask("00.000-000")
        // console.log(zipcode);
        $.ajax({
            url: 'https://viacep.com.br/ws/'+zipcode+'/json/', 
            method: 'GET',
            dataType: 'json',
            success: function(data){
                //colocando os dados nos campos correspondentes
                $('#city').val(data.localidade);
                $('#uf').val(data.uf);
                $('#district').val(data.bairro);
                $('#street').val(data.logradouro);
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    //script para adicionar mais divs para cadastro de computadores
    function add_div(addMachine){
        var display = document.getElementById(addMachine).style.display;
        // if (display == "none")
            document.getElementById(addMachine).style.display = "block"
        // else
        //     document.getElementById(el).style.display = 'none' 
    } 

    // Teste para filto da tabela
    $(document).ready( function () {
    

        $('#providerTable').DataTable({
            "language": {
              "sEmptyTable": "Nenhum registro encontrado",
              "sInfo": "Exibindo de _START_ até _END_ de _TOTAL_ registros",
              "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
              "sInfoFiltered": "(Filtrados de _MAX_ registros)",
              "sInfoPostFix": "",
              "sInfoThousands": ".",
              "sLengthMenu": "Resultados por página: _MENU_ ",
              "sLoadingRecords": "Carregando...",
              "sProcessing": "Processando...",
              "sZeroRecords": "Nenhum registro encontrado",
              "sSearch": "Pesquisar",
              "oPaginate": {
                  "sNext": "Próximo",
                  "sPrevious": "Anterior",
                  "sFirst": "Primeiro",
                  "sLast": "Último"
              },
              "oAria": {
                  "sSortAscending": ": Ordenar colunas de forma ascendente",
                  "sSortDescending": ": Ordenar colunas de forma descendente"
              },
              "select": {
                  "rows": {
                      "_": "Selecionado %d linhas",
                      "0": "Nenhuma linha selecionada",
                      "1": "Selecionado 1 linha"
                  }
              }
            },
          });
      });
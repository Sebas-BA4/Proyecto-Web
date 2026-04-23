$(function() {

    $(".reg_producto .btn_mostrar").click(function(e) {
        let codprod = $(this).closest(".reg_producto").children(".codprod").text();

        location.href = "mostrar_producto.php?codprod=" + codprod;
    })

    $(".reg_producto .btn_editar").click(function(e) {
        let codprod = $(this).closest(".reg_producto").children(".codprod").text();

        location.href = "editar_producto.php?codprod=" + codprod;
    })
    
    $(".reg_producto .btn_borrar").click(function(e) {
        let codprod = $(this).closest(".reg_producto").children(".codprod").text();
        let prod = $(this).closest(".reg_producto").children(".prod").text();

        $("#md_borrar .lbl_codprod").text(codprod);
        $("#md_borrar .lbl_prod").text(prod);

        $("#md_borrar .btn_borrar").attr("href", "../controller/ctr_borrar_prod.php?codprod=" + codprod);
        
        $("#md_borrar").modal("show");
    })
    

    $("#frm_consultar_prod #txt_codprod").focusout(function(e) {
        e.preventDefault();

        let codprod = $(this).val();

        if (codprod != "") {
            $.ajax  ({
                url: "../controller/ctr_consultar_prod.php",
                type: "POST",
                data: {codprod: codprod},
                success: function(rpta) {
                    let rp = JSON.parse(rpta);

                    if (rp) {
                        $(".prod").html(rp.producto);
                        $(".stk").html(rp.stock);
                        $(".cst").html("S/ " + rp.costo);
                        $(".gnc").html(rp.ganancia * 100 + "%");
                        let precioFormateado = parseFloat(rp.precio).toFixed(2);
                        $(".prc").html("S/ " + precioFormateado);
                        $(".mar").html(rp.marca);
                        $(".cat").html(rp.categoria);
                    } else {
                        alert("El código " + codprod + " no existe");

                        $("#txt_codprod").val("");

                        let vacio = "&nbsp";
                        $(".prod").html(vacio);
                        $(".stk").html(vacio);
                        $(".cst").html(vacio);
                        $(".gnc").html(vacio);
                        $(".prc").html(vacio);
                        $(".mar").html(vacio);
                        $(".cat").html(vacio);

                        $("#txt_codprod").focus();
                    }
                }
            })
        }
    })

})
var principal = 50000
var period = 0
var AIR = 0
var PIM = 0
var IPY = 0
var IPM = 0
var TIDM =0
var TP = 0
var TPM = 0
$(function(){
    function calculation() {
        PIM = period*12
        IPY = principal*AIR
        IPM = (IPY/12).toFixed(2)
        TIDM = IPY*period
        TP = principal+TIDM
        TPM = (TP/PIM).toFixed(2)
        AIRP = AIR*100+"%"

        $('#principal').html(principal)
        $('#PIM').html(PIM)
        $('#IPY').html(IPY)
        $('#IPM').html(IPM)
        $('#TIDM').html(TIDM)
        $('#TP').html(TP)
        $('#TPM').html(TPM)
        $('#AIRP').html(AIRP)
        $('#period').html(period)

    }

    $('#setP_5').click(function () {
        principal = 50000
        calculation()
    })
    
    $('#setP_10').click(function () {
        principal = 100000
        calculation()
    })

    $('#setP_20').click(function () {
        principal = 200000
        calculation()
    })

    $('#setP_30').click(function () {
        principal = 300000
        calculation()
    })

    $('#setP_50').click(function () {
        principal = 500000
        calculation()
    })

    $('#setPeriod_0').click(function () {
        period = 1
        AIR = 0
        calculation()
    })

    $('#setPeriod_1').click(function () {
        period = 2
        AIR = 0.04
        calculation()
    })

    $('#setPeriod_2').click(function () {
        period = 3
        AIR = 0.08
        calculation()
    })

})
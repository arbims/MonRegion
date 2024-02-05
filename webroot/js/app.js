$(document).ready(function() {
  $('#region-id').on('change', function() {
    let regionId = $(this).val()
    $.get('http://localhost:8000/mdecins/getDepartement?regId='+regionId, function(data) {
      $('#departement_select').empty()
      $('#departement_select').append(data)
      $('#ville-id').find('option').remove().end().append('<option value="">Selectionner votre ville</option>')
      changeDepartement()
    })
  })
  changeDepartement()
})


function changeDepartement() {
  $('#departement-id').on('change', function() {
    let depId = $(this).val()
    $.get('http://localhost:8000/mdecins/getVille?depId='+depId, function(data) {
      $('#ville_select').empty()
      $('#ville_select').append(data)
    })
  })
}

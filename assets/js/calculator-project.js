
  const totalSteps = 10;


$(document).ready(function () {

  waclickOrder();

  // Initialize each wizard form in all modals
  $('.wizardForm').each(function () {
    const form = $(this);
    //form.data('currentstep', 1);
    showStep(form, 1);
    showSubtotal(form, 1);

    // Hide prev button on first step
    form.find('.prevBtn').toggle(false);
  });

  // Handle Next button click
  $(document).on('click', '.nextBtn', function () {
    const form = $(this).closest('form');
    let currentstep = parseInt(form.attr('data-currentstep')) || 1;

    const currentStepEl = form.find(`.wizard-step[data-step="${currentstep}"]`);
    const selectedVal = currentStepEl.find('select').val();

    if (selectedVal === "-1") {
      alert('Silakan pilih opsi sebelum melanjutkan.');
      return;
    }

    if (currentstep < totalSteps) {
      currentstep++;
      form.attr('data-currentstep', currentstep);
      showStep(form, currentstep);
      showSubtotal(form, currentstep);

      // Show/hide prev button
      form.find('.prevBtn').toggle(currentstep > 1);

      // Change Next button text on last step
      if (currentstep === totalSteps) {
        $(this).text('Selesai');
      } else {
        $(this).text('Berikutnya');
      }

    } else {
      // Step akhir: tampilkan hasil
      let totalx = calculateSubtotal(form);
      const summary = getSelectedOptionsSummary(form);

      form.hide();
     const resultBox = form.siblings('.finalResult');
resultBox.find('.finalSummary').html(summary);
resultBox.find('.finalCost').text(`Rp ${totalx.toLocaleString('id-ID')}`);
resultBox.removeClass('d-none');

      form.siblings('.finalResult').removeClass('d-none');
      form.siblings('.subtotalBox').addClass('d-none');
    }
  });

  // Handle Prev button click
  $(document).on('click', '.prevBtn', function () {
    const form = $(this).closest('form');
    let currentstep = parseInt(form.attr('data-currentstep')) || 1;

    if (currentstep > 1) {
      currentstep--;
      form.attr('data-currentstep', currentstep);
      showStep(form, currentstep);
      showSubtotal(form, currentstep);

      // Show/hide prev button
      form.find('.prevBtn').toggle(currentstep > 1);

      // Change Next button text
      if (currentstep < totalSteps) {
        form.find('.nextBtn').text('Berikutnya');
      }
    }
  });

  // Update subtotal on select change
  $(document).on('change', '.cost-input', function () {
    const form = $(this).closest('form');
    const currentstep = parseInt(form.attr('data-currentstep')) || 1;
    showSubtotal(form, currentstep);

    // Reset final result and show subtotal box again
    form.siblings('.finalResult').addClass('d-none');
    form.siblings('.subtotalBox').removeClass('d-none');
  });

});


 function showStep(container, step) {
    container.find('.wizard-step').removeClass('active');
    container.find(`.wizard-step[data-step="${step}"]`).addClass('active');
  }

let demoMode = false;

  function calculateSubtotal(container, upToStep = totalSteps) {
    
     let total = 0;
    

    container.find('.cost-input').each(function () {
      const step = parseInt($(this).closest('.wizard-step').data('step'));
      
      const value = parseInt($(this).val()) || 0;

      //console.log('Step:', step, 'Value:', value, 'Upto:', upToStep);

      
        total += value;
        if (step === 1 && value === 500) {
          demoMode = true;
        }
      
    });

    return demoMode ? total * 300 : total * 1000;
  }

  function showSubtotal(container, upToStep) {
    let subtotal = calculateSubtotal(container, upToStep);
    
    container.next().find('.subtotal').text('Rp. ' + subtotal.toLocaleString('id-ID'));
    container.next().find('.subtotalBox').removeClass('d-none');
    
  }

  function getSelectedOptionsSummary(container) {
    let summaryHtml = '<ul class="list-group">';
    container.find('.wizard-step').each(function () {
      const label = $(this).find('h5').text();
      const selected = $(this).find('select option:selected').text();
      summaryHtml += `<li class="list-group-item"><strong>${label}</strong>: ${selected}</li>`;
    });
    summaryHtml += '</ul>';
    return summaryHtml;
  }


 function waclickOrder() {
  $('.wa-link-pesan-app').on('click', function () {
    
    // Ambil semua <li> dari finalSummary
    let message = '';
    $('.finalSummary li').each(function () {
      message += $(this).text().trim() + '\n';
    });

    let harga = $(this).parent().find('.finalCost').text();
    let hargaText = "\nBudget saya *" + harga + "* bisa diproses, kaa?";

    let jenis = $(this).data('jenis');

    let introtext = "Saya mau pesan app " + jenis + "\nDengan Opsi Rincian:\n " + message + hargaText;

    // Encode untuk WhatsApp
    let encodedMessage = encodeURIComponent(introtext);

    // Ganti nomor WA sesuai kebutuhan
    let waNumber = '6285795569337'; // tanpa tanda +
    let waURL = `https://wa.me/${waNumber}?text=${encodedMessage}`;

    // Buka WhatsApp
    window.open(waURL, '_blank');
  });
}

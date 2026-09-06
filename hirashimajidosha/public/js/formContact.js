$(function () {
  $("button[type=submit]").prop("disabled", true);
  $(".agreeCheck input").on("change", function (e) {
    if ($(this).prop("checked") == true) {
      $("button[type=submit]").prop("disabled", false);
    } else {
      $("button[type=submit]").prop("disabled", true);
    }
  });
  // 必須項目が未入力のときのエラーメッセージの表示位置
  const errTxtPosition = "topLeft";

  $(".validateRequired")
    .addClass("validate[required]")
    .attr("data-prompt-position", errTxtPosition);
  $(".validatePhone1")
    .addClass("validate[required,custom[phone]]")
    .attr("data-prompt-position", errTxtPosition);
  $(".validatePhone2")
    .addClass("validate[custom[phone]]")
    .attr("data-prompt-position", errTxtPosition);
  $(".validateEmail")
    .addClass("validate[required,custom[email]]")
    .attr("data-prompt-position", errTxtPosition);
  $(".validateConfirmEmail")
    .addClass("validate[required,equals[email]]")
    .attr("data-prompt-position", errTxtPosition);
  $(".validateMinCheckbox")
    .addClass("validate[minCheckbox[1]]")
    .attr("data-prompt-position", errTxtPosition);
  $(".check1")
    .addClass("validate[minCheckbox[1]]")
    .attr("data-prompt-position", errTxtPosition);
  $(".validateGroup")
    .addClass("validate[groupRequired[checkContact]]")
    .attr("data-prompt-position", errTxtPosition);
  $(".validateHiragana1")
    .addClass("validate[required,custom[hiragana]]")
    .attr("data-prompt-position", errTxtPosition);
  $(".validateHiragana2")
    .addClass("validate[custom[hiragana]]")
    .attr("data-prompt-position", errTxtPosition);
  $(".validateKatakana1")
    .addClass("validate[required,custom[katakana]]")
    .attr("data-prompt-position", errTxtPosition);
  $(".validateKatakana2")
    .addClass("validate[custom[katakana]]")
    .attr("data-prompt-position", errTxtPosition);

  // フリガナ
  $.fn.autoKana("input.name", ".kana", {
    //katakana: false, // ひらがな
    katakana: true, // カタカナ
  });

  // 郵便番号
  $(".zip1").jpostal({
    postcode: [
      ".zip1", //郵便番号上3ケタ
      ".zip2", //郵便番号下4ケタ
    ],
    address: {
      // "#pref": "%3", //都道府県
      // "#city": "%4%5", //市区町村 町域
      ".address01": "%3%4%5",
    },
  });

  $(".zip3").jpostal({
    postcode: [
      ".zip3", //郵便番号上3ケタ
      ".zip4", //郵便番号下4ケタ
    ],
    address: {
      // "#pref": "%3", //都道府県
      // "#city": "%4%5", //市区町村 町域
      ".address02": "%3%4%5",
    },
  });

  $(".form").validationEngine("attach", {
    onValidationComplete: function (form, status) {
      if (status) {
        sendForm();
      }
    },
  });
});

function sendForm() {
  var formDataArr = $("form").serializeArray();
  var formData = new FormData();
  formData.append(
    "formtype",
    $("form").data("formtype") ? $("form").data("formtype") : ""
  );

  if (formDataArr.length > 0) {
    // 日付用の変数（必要に応じて追加する）
    var postal01;
    var postal02;
    var yearArr0 = [];
    var yearArr1 = [];
    var yearArr2 = [];
    var yearArr3 = [];

    formDataArr.map(function (item) {
      // 日付のフォーマット
      switch (item.name) {
        // 郵便番号
        case "postal_01":
          postal01 = item.value ? item.value : "";
          break;
        case "postal_02":
          postal02 = item.value ? "-" + item.value : "";
          formData.append("郵便番号", postal01 + postal02);
          break;
        // 生年月日
        // ▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△
        case "year":
          yearArr0["年"] = item.value ? item.value : "";
          break;

        case "month":
          yearArr0["月"] = item.value ? item.value : "";
          break;

        case "day":
          yearArr0["日"] = item.value ? item.value : "";

          var yearStr0 = "";
          for (key in yearArr0) {
            yearStr0 += yearArr0[key] + key;
          }
          formData.append("生年月日", yearStr0);
          break;
        // ▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△

        // 希望日時1
        // ▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△
        case "year1":
          yearArr1["年"] = item.value ? item.value : "";
          break;

        case "month1":
          yearArr1["月"] = item.value ? item.value : "";
          break;

        case "day1":
          yearArr1["日"] = item.value ? item.value : "";
          break;

        case "hour1_1":
          yearArr1["時1"] = item.value ? item.value : "";
          break;

        case "minute1_1":
          yearArr1["分1"] = item.value ? item.value : "";
          break;

        case "hour1_2":
          yearArr1["時2"] = item.value ? item.value : "";
          break;

        case "minute1_2":
          yearArr1["分2"] = item.value ? item.value : "";

          // 時間の形式を結合
          yearArr1[""] =
            yearArr1["時1"] +
            ":" +
            yearArr1["分1"] +
            "~" +
            yearArr1["時2"] +
            ":" +
            yearArr1["分2"];
          delete yearArr1["時1"];
          delete yearArr1["分1"];
          delete yearArr1["時2"];
          delete yearArr1["分2"];

          var yearStr1 = "";
          for (key in yearArr1) {
            yearStr1 += yearArr1[key] + key;
          }
          formData.append("第一希望", yearStr1);
          break;
        // ▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△

        // 希望日時2
        // ▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△
        case "year2":
          yearArr2["年"] = item.value ? item.value : "";
          break;

        case "month2":
          yearArr2["月"] = item.value ? item.value : "";
          break;

        case "day2":
          yearArr2["日"] = item.value ? item.value : "";
          break;

        case "hour2_1":
          yearArr2["時1"] = item.value ? item.value : "";
          break;

        case "minute2_1":
          yearArr2["分1"] = item.value ? item.value : "";
          break;

        case "hour2_2":
          yearArr2["時2"] = item.value ? item.value : "";
          break;

        case "minute2_2":
          yearArr2["分2"] = item.value ? item.value : "";

          // 時間の形式を結合
          yearArr2[""] =
            yearArr2["時1"] +
            ":" +
            yearArr2["分1"] +
            "~" +
            yearArr2["時2"] +
            ":" +
            yearArr2["分2"];
          delete yearArr2["時1"];
          delete yearArr2["分1"];
          delete yearArr2["時2"];
          delete yearArr2["分2"];

          var yearStr2 = "";
          for (key in yearArr2) {
            yearStr2 += yearArr2[key] + key;
          }
          formData.append("第二希望", yearStr2);
          break;
        // ▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△

        // 希望日時3
        // ▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△
        case "year3":
          yearArr3["年"] = item.value ? item.value : "";
          break;

        case "month3":
          yearArr3["月"] = item.value ? item.value : "";
          break;

        case "day3":
          yearArr3["日"] = item.value ? item.value : "";
          break;

        case "hour3":
          yearArr3["時"] = item.value ? item.value : "";
          break;

        case "minute3":
          yearArr3["分"] = item.value ? item.value : "";

          var yearStr3 = "";
          for (key in yearArr3) {
            yearStr3 += yearArr3[key] + key;
          }
          formData.append("希望日時3", yearStr3);
          break;
        // ▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△

        default:
          if (item.value) {
            // checkbox対策
            // ▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△
            if (item.value == "__checkbox") {
              if (!formData.has(item.name)) {
                formData.append(item.name, " ");
                break;
              }
            } else {
              formData.append(item.name, item.value);
            }
            // ▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△
          } else {
            formData.append(item.name, " ");
          }
          break;
      }

      if ($("[name='" + item.name + "']").data("displaynameattr")) {
        formData.append(
          "display_name__" + item.name,
          $("[name='" + item.name + "']").data("displaynameattr")
        );
      }
    });

    // 添付ファイル数に応じて増減させる
    // formData.append('file1', $("input[name='file1']").prop("files")[0]);
    // formData.append('file2', $("input[name='file2']").prop("files")[0]);
    // formData.append('file3', $("input[name='file3']").prop("files")[0]);
    // formData.append('file4', $("input[name='file4']").prop("files")[0]);
    // formData.append('file5', $("input[name='file5']").prop("files")[0]);
    // console.log(...formData.entries());
    // return;

    $.ajax({
      type: "POST",
      url: "/ajax/contact",
      data: formData,
      timeout: 15000, // タイムアウト：15秒
      dataType: "json",
      processData: false,
      contentType: false,
    })
      .done(function (res) {
        if (res.status === "error") {
          alert(res.errorMsg);
        } else {
          $(".form")[0].reset();
          window.location.href = $(".form").attr("action");
        }
      })
      .fail(function () {
        alert("エラーが発生しました。");
      });
  } else {
    alert("送信に失敗しました");
  }
}

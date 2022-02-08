const getPet = (birthYear) => {
  const toyear = 1997;
  let birthyear = birthYear;
  let birthpet = "ฉลู";

  let x = (toyear - birthyear) % 12;
  if (x == 1 || x == -11) {
    birthpet = "ชวด";
  } else {
    if (x == 0) {
      birthpet = "ฉลู";
    } else {
      if (x == 11 || x == -1) {
        birthpet = "ขาล";
      } else {
        if (x == 10 || x == -2) {
          birthpet = "เถาะ";
        } else {
          if (x == 9 || x == -3) {
            birthpet = "มะโรง";
          } else {
            if (x == 8 || x == -4) {
              birthpet = "มะเส็ง";
            } else {
              if (x == 7 || x == -5) {
                birthpet = "มะแม";
              } else {
                if (x == 6 || x == -6) {
                  birthpet = "มะเมีย";
                } else {
                  if (x == 5 || x == -7) {
                    birthpet = "วอก";
                  } else {
                    if (x == 4 || x == -8) {
                      birthpet = "ระกา";
                    } else {
                      if (x == 3 || x == -9) {
                        birthpet = "จอ";
                      } else {
                        if (x == 2 || x == -10) {
                          birthpet = "กุน";
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
  console.log(birthpet);
};

getPet(2000);

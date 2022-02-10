SELECT
    b.id,
    s.id AS subDistrictId,
    prename,
    firstName,
    lastName,
    birthDateTime,
    birthDay,
    weight,
    lunarPhase,
    thaiMonth,
    thaiYears,
    preNameFather,
    firstNameFather,
    lastNameFather,
    cidFather,
    preNameMother,
    firstNameMother,
    lastNameMother,
    cidMother,
    address,
    subDistrict,
    informerName,
    informerTel,
    relation,
    s.name_in_thai AS subDistrict,
    s.zip_code,
    d.name_in_thai AS district,
    p.name_in_thai AS province
FROM
    birth b
    INNER JOIN subdistricts s
    ON b.subDistrict = s.id
    INNER JOIN districts d
    ON s.district_id = d.id
    INNER JOIN provinces p
    ON d.province_id = p.id
WHERE
    b.id = '4'
SELECT
    DISTINCT o.vstdate,
    o.hn,
    p.pname,
    p.fname,
    p.lname,
    v.pdx,
    v.dx0,
    v.dx1,
    v.dx2,
    v.dx3,
    v.dx4,
    v.dx5,
    v.pttype,
    pt.name,
    p.cid,
    cc.cc,
    v.income
FROM
    ovst o
    JOIN opitemrece op
    ON op.vn = o.vn
    JOIN nondrugitems n
    ON n.icode = op.icode
    JOIN patient p
    ON o.hn = p.hn
    JOIN vn_stat v
    ON v.vn = o.vn
    JOIN icd101 i
    ON i.code = v.pdx
    JOIN pttype pt
    ON pt.pttype = o.pttype
    JOIN opdscreen_cc_list cc
    ON o.vn = cc.vn
WHERE
    o.vstdate BETWEEN '2021-10-01' AND '2022-01-31' AND (
        pt.hipdata_code = 'UCS' AND (
            v.pdx BETWEEN 'C000' AND 'C969'
        ) OR (
            v.pdx BETWEEN 'D370' AND 'D480'
        ) OR (
            v.pdx BETWEEN 'I600' AND 'I690'
        ) OR (v.pdx = 'N185') OR (
            v.pdx BETWEEN 'J440' AND 'J449'
        ) OR (
            v.pdx BETWEEN 'B200' AND 'B229'
        ) OR (
            v.pdx BETWEEN 'K720' AND 'K729'
        ) OR (
            v.pdx BETWEEN 'K704' AND 'K717'
        ) OR (
            v.pdx BETWEEN 'I500' AND 'I509'
        )
    )
GROUP BY
    o.vstdate,
    o.hn,
    p.pname,
    p.fname,
    p.lname,
    v.pdx,
    v.pttype,
    pt.name,
    p.cid,
    cc.cc,
    v.income,
    v.dx0,
    v.dx1,
    v.dx2,
    v.dx3,
    v.dx4,
    v.dx5
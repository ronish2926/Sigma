package com.haris.kareem_driver.DatabaseUtil;

import android.database.DatabaseUtils;

import com.haris.kareem_driver.InterfaceUtil.SqlQueries;
import com.haris.kareem_driver.ObjectUtil.DataObject;
import com.haris.kareem_driver.Utility.Utility;

public class QueryFactory extends DbQuery {


    public QueryFactory() {
        Utility.Logger(QueryFactory.class.getName(), "Setting : Working");
    }


    /**
     * <p>It is used to get Required Formmatted for getting required data</p>
     *
     * @param databaseObject
     * @return
     */
    public String getRequiredFormattedQuery(DatabaseObject databaseObject) {

        SqlQueries sqlQueries = null;
        String formattedQuery = null;
        DataObject dataObject = null;

        if (databaseObject.getDataObject() == null)
            return "null";
        else
            dataObject = databaseObject.getDataObject();




        return formattedQuery;
    }


    /**
     * <p>It is used to convert String into
     * Database friendly String </p>
     *
     * @param data
     * @return
     */
    private String sqlString(String data) {
        String sql = null;

        if (Utility.isEmptyString(data))
            sql = "null";
        else {
            sql = DatabaseUtils.sqlEscapeString(data);
        }

        return sql;

    }

}
